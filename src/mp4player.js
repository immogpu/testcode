const DEFAULT_OPTIONS = {
  sources: [],
  autoplay: false,
  loop: false,
  muted: false,
  preload: 'metadata',
  poster: '',
  playsInline: true,
  volume: 0.8,
  controlLabels: {
    play: 'Play video',
    pause: 'Pause video',
    mute: 'Mute audio',
    unmute: 'Unmute audio',
    fullscreen: 'Toggle fullscreen',
    timeline: 'Video position',
    volume: 'Volume'
  }
};

const CLASS_NAMES = {
  root: 'mp4-player',
  video: 'mp4-player__video',
  controls: 'mp4-player__controls',
  playToggle: 'mp4-player__play-toggle',
  timeline: 'mp4-player__timeline',
  timelineTrack: 'mp4-player__timeline-track',
  time: 'mp4-player__time',
  volume: 'mp4-player__volume',
  fullscreen: 'mp4-player__fullscreen',
  buffered: 'mp4-player__buffered',
  srOnly: 'mp4-player__sr-only'
};

const FULLSCREEN_APIS = [
  {
    request: 'requestFullscreen',
    exit: 'exitFullscreen',
    element: 'fullscreenElement'
  },
  {
    request: 'webkitRequestFullscreen',
    exit: 'webkitExitFullscreen',
    element: 'webkitFullscreenElement'
  },
  {
    request: 'msRequestFullscreen',
    exit: 'msExitFullscreen',
    element: 'msFullscreenElement'
  }
];

function mergeOptions(target, source) {
  const output = { ...target };
  for (const key of Object.keys(source || {})) {
    if (source[key] && typeof source[key] === 'object' && !Array.isArray(source[key])) {
      output[key] = mergeOptions(target[key] || {}, source[key]);
    } else {
      output[key] = source[key];
    }
  }
  return output;
}

function resolveElement(target) {
  if (typeof target === 'string') {
    const el = document.querySelector(target);
    if (!el) {
      throw new Error(`Mp4Player: No element found for selector "${target}"`);
    }
    return el;
  }
  if (target instanceof HTMLElement) {
    return target;
  }
  throw new Error('Mp4Player: container must be a selector or HTMLElement');
}

function createElement(tag, className, attributes = {}) {
  const el = document.createElement(tag);
  if (className) {
    el.className = className;
  }
  for (const [key, value] of Object.entries(attributes)) {
    if (value !== undefined && value !== null) {
      el.setAttribute(key, value);
    }
  }
  return el;
}

function formatTime(value) {
  if (!Number.isFinite(value) || value < 0) {
    return '00:00';
  }
  const totalSeconds = Math.floor(value);
  const minutes = Math.floor(totalSeconds / 60);
  const seconds = totalSeconds % 60;
  return `${String(minutes).padStart(2, '0')}:${String(seconds).padStart(2, '0')}`;
}

function getFullscreenApi(element) {
  for (const api of FULLSCREEN_APIS) {
    if (element[api.request]) {
      return api;
    }
  }
  return null;
}

export class Mp4Player {
  constructor(target, options = {}) {
    this.container = resolveElement(target);
    this.options = mergeOptions(DEFAULT_OPTIONS, options);
    this._handlers = [];
    this._build();
    this._bind();
    this._applyInitialState();
  }

  _build() {
    this.root = createElement('div', CLASS_NAMES.root);
    this.root.tabIndex = 0;
    this.video = createElement('video', CLASS_NAMES.video, {
      preload: this.options.preload,
      playsinline: this.options.playsInline ? '' : undefined
    });
    this.video.controls = false;

    if (this.options.poster) {
      this.video.poster = this.options.poster;
    }
    this.video.autoplay = Boolean(this.options.autoplay);
    this.video.loop = Boolean(this.options.loop);
    this.video.muted = Boolean(this.options.muted);

    for (const source of this.options.sources) {
      const sourceEl = document.createElement('source');
      sourceEl.src = source.src;
      if (source.type) {
        sourceEl.type = source.type;
      }
      this.video.appendChild(sourceEl);
    }

    this.playToggle = createElement('button', CLASS_NAMES.playToggle, {
      type: 'button',
      'aria-label': this.options.controlLabels.play
    });
    this.playToggle.innerHTML = '<span aria-hidden="true">▶</span><span class="' + CLASS_NAMES.srOnly + '">' + this.options.controlLabels.play + '</span>';

    this.timelineWrapper = createElement('div', CLASS_NAMES.timeline);
    this.timelineInput = createElement('input', CLASS_NAMES.timelineTrack, {
      type: 'range',
      min: '0',
      max: '100',
      step: '0.1',
      value: '0',
      'aria-label': this.options.controlLabels.timeline
    });
    this.timelineWrapper.appendChild(this.timelineInput);

    this.bufferedBar = createElement('div', CLASS_NAMES.buffered);
    this.timelineWrapper.appendChild(this.bufferedBar);

    this.timeCurrent = createElement('span', `${CLASS_NAMES.time} ${CLASS_NAMES.time}-current`);
    this.timeDuration = createElement('span', `${CLASS_NAMES.time} ${CLASS_NAMES.time}-duration`);
    this.timeCurrent.textContent = '00:00';
    this.timeDuration.textContent = '00:00';

    this.volumeInput = createElement('input', CLASS_NAMES.volume, {
      type: 'range',
      min: '0',
      max: '1',
      step: '0.05',
      value: String(this.options.volume),
      'aria-label': this.options.controlLabels.volume
    });

    this.fullscreenToggle = createElement('button', CLASS_NAMES.fullscreen, {
      type: 'button',
      'aria-label': this.options.controlLabels.fullscreen
    });
    this.fullscreenToggle.innerHTML = '<span aria-hidden="true">⛶</span><span class="' + CLASS_NAMES.srOnly + '">' + this.options.controlLabels.fullscreen + '</span>';

    const controls = createElement('div', CLASS_NAMES.controls);
    controls.append(
      this.playToggle,
      this.timelineWrapper,
      this.timeCurrent,
      this.timeDuration,
      this.volumeInput,
      this.fullscreenToggle
    );

    this.root.append(this.video, controls);

    this.container.innerHTML = '';
    this.container.appendChild(this.root);
  }

  _bind() {
    this._listen(this.playToggle, 'click', () => this.togglePlay());
    this._listen(this.video, 'click', () => this.togglePlay());
    this._listen(this.video, 'play', () => this._syncPlayState(true));
    this._listen(this.video, 'pause', () => this._syncPlayState(false));
    this._listen(this.video, 'timeupdate', () => this._updateTime());
    this._listen(this.video, 'durationchange', () => this._updateDuration());
    this._listen(this.video, 'progress', () => this._updateBuffered());
    this._listen(this.video, 'loadedmetadata', () => {
      this._updateDuration();
      this._updateBuffered();
      this._updateVolume();
    });
    this._listen(this.timelineInput, 'input', (event) => {
      const value = Number(event.target.value);
      this._seekToPercent(value);
    });
    this._listen(this.timelineInput, 'change', (event) => {
      const value = Number(event.target.value);
      this._seekToPercent(value);
    });
    this._listen(this.volumeInput, 'input', (event) => {
      const value = Number(event.target.value);
      this.setVolume(value);
    });
    this._listen(this.fullscreenToggle, 'click', () => this.toggleFullscreen());
    this._listen(this.video, 'keydown', (event) => this._handleKeydown(event));
    this._listen(this.root, 'keydown', (event) => this._handleKeydown(event));
  }

  _applyInitialState() {
    this.setVolume(this.options.volume);
    if (this.options.autoplay) {
      // Autoplay might be blocked, but we attempt to start.
      const playAttempt = this.video.play();
      if (playAttempt && typeof playAttempt.catch === 'function') {
        playAttempt.catch(() => {
          this.video.muted = true;
          return this.video.play().catch(() => {});
        });
      }
    }
    this._syncPlayState(!this.video.paused);
    this._updateDuration();
    this._updateTime();
  }

  _listen(target, event, handler) {
    target.addEventListener(event, handler);
    this._handlers.push({ target, event, handler });
  }

  _syncPlayState(isPlaying) {
    this.playToggle.classList.toggle('is-playing', isPlaying);
    const playLabel = this.options.controlLabels.play;
    const pauseLabel = this.options.controlLabels.pause;
    this.playToggle.setAttribute('aria-label', isPlaying ? pauseLabel : playLabel);
    this.playToggle.innerHTML = isPlaying
      ? `<span aria-hidden="true">❚❚</span><span class="${CLASS_NAMES.srOnly}">${pauseLabel}</span>`
      : `<span aria-hidden="true">▶</span><span class="${CLASS_NAMES.srOnly}">${playLabel}</span>`;
  }

  _updateTime() {
    const duration = this.video.duration || 0;
    const current = this.video.currentTime || 0;
    this.timeCurrent.textContent = formatTime(current);
    if (duration) {
      this.timelineInput.value = String((current / duration) * 100);
    }
  }

  _updateDuration() {
    const duration = this.video.duration;
    if (Number.isFinite(duration)) {
      this.timeDuration.textContent = formatTime(duration);
    } else {
      this.timeDuration.textContent = '00:00';
    }
  }

  _updateBuffered() {
    if (!this.video.buffered || this.video.buffered.length === 0) {
      this.bufferedBar.style.width = '0%';
      return;
    }
    const bufferedEnd = this.video.buffered.end(this.video.buffered.length - 1);
    const duration = this.video.duration || 1;
    const percent = Math.min(100, Math.max(0, (bufferedEnd / duration) * 100));
    this.bufferedBar.style.width = `${percent}%`;
  }

  _updateVolume() {
    this.volumeInput.value = String(this.video.volume);
  }

  _seekToPercent(percent) {
    const duration = this.video.duration;
    if (!Number.isFinite(duration) || duration === 0) {
      return;
    }
    const time = (percent / 100) * duration;
    this.video.currentTime = time;
  }

  _handleKeydown(event) {
    if (event.defaultPrevented) return;
    switch (event.key) {
      case ' ':
      case 'Spacebar':
      case 'k':
        event.preventDefault();
        this.togglePlay();
        break;
      case 'ArrowLeft':
        event.preventDefault();
        this.seekBy(-5);
        break;
      case 'ArrowRight':
        event.preventDefault();
        this.seekBy(5);
        break;
      case 'ArrowUp':
        event.preventDefault();
        this.setVolume(Math.min(1, this.video.volume + 0.05));
        break;
      case 'ArrowDown':
        event.preventDefault();
        this.setVolume(Math.max(0, this.video.volume - 0.05));
        break;
      case 'f':
        event.preventDefault();
        this.toggleFullscreen();
        break;
      case 'm':
        event.preventDefault();
        this.toggleMute();
        break;
    }
  }

  play() {
    return this.video.play();
  }

  pause() {
    this.video.pause();
  }

  togglePlay() {
    if (this.video.paused) {
      const playPromise = this.play();
      if (playPromise && typeof playPromise.catch === 'function') {
        playPromise.catch(() => {});
      }
    } else {
      this.pause();
    }
  }

  toggleMute() {
    this.video.muted = !this.video.muted;
    const label = this.video.muted ? this.options.controlLabels.unmute : this.options.controlLabels.mute;
    this.volumeInput.setAttribute('aria-label', label);
  }

  seekBy(deltaSeconds) {
    const duration = this.video.duration;
    if (!Number.isFinite(duration) || duration === 0) {
      return;
    }
    const targetTime = Math.min(Math.max(this.video.currentTime + deltaSeconds, 0), duration);
    this.video.currentTime = targetTime;
  }

  setVolume(value) {
    const nextValue = Math.min(1, Math.max(0, Number(value)));
    this.video.volume = nextValue;
    this.video.muted = nextValue === 0;
    this.volumeInput.value = String(nextValue);
    const label = this.video.muted ? this.options.controlLabels.unmute : this.options.controlLabels.volume;
    this.volumeInput.setAttribute('aria-label', label);
  }

  setSource(sources) {
    while (this.video.firstChild) {
      this.video.removeChild(this.video.firstChild);
    }
    const arraySources = Array.isArray(sources) ? sources : [sources];
    for (const source of arraySources) {
      if (!source || !source.src) continue;
      const sourceEl = document.createElement('source');
      sourceEl.src = source.src;
      if (source.type) {
        sourceEl.type = source.type;
      }
      this.video.appendChild(sourceEl);
    }
    this.video.load();
  }

  toggleFullscreen() {
    const api = getFullscreenApi(this.root);
    const docApi = getFullscreenApi(document);
    if (!api || !docApi) {
      this.root.classList.toggle('is-fullscreen');
      return;
    }
    const doc = document;
    const isFullscreen = Boolean(doc[docApi.element]);
    if (!isFullscreen) {
      this.root.focus({ preventScroll: true });
      return this.root[api.request]();
    }
    return doc[docApi.exit]();
  }

  destroy() {
    for (const { target, event, handler } of this._handlers) {
      target.removeEventListener(event, handler);
    }
    this._handlers = [];
    this.root.remove();
  }

  static enhanceAll(selector = '[data-mp4-player]') {
    const nodes = document.querySelectorAll(selector);
    return Array.from(nodes).map((node) => {
      const config = node.getAttribute('data-mp4-player-config');
      let options = {};
      if (config) {
        try {
          options = JSON.parse(config);
        } catch (error) {
          console.warn('Mp4Player: Failed to parse config JSON', error);
        }
      }
      const sources = Array.from(node.querySelectorAll('source')).map((source) => ({
        src: source.getAttribute('src'),
        type: source.getAttribute('type') || undefined
      }));
      if (sources.length) {
        options.sources = sources;
      }
      return new Mp4Player(node, options);
    });
  }
}

export function createMp4Player(target, options) {
  return new Mp4Player(target, options);
}

export default Mp4Player;
