import assert from 'assert/strict';
import { JSDOM } from 'jsdom';
import { Mp4Player } from '../src/mp4player.js';

function setupDom() {
  const dom = new JSDOM('<!doctype html><html><body><div id="app"></div></body></html>', {
    pretendToBeVisual: true,
    url: 'http://localhost/'
  });

  const { window } = dom;
  globalThis.window = window;
  globalThis.document = window.document;
  globalThis.HTMLElement = window.HTMLElement;
  globalThis.CustomEvent = window.CustomEvent;
  Object.defineProperty(globalThis, 'navigator', {
    configurable: true,
    value: window.navigator
  });

  const mediaProto = window.HTMLMediaElement.prototype;
  Object.defineProperty(mediaProto, 'play', {
    configurable: true,
    value() {
      this.paused = false;
      return Promise.resolve();
    }
  });
  Object.defineProperty(mediaProto, 'pause', {
    configurable: true,
    value() {
      this.paused = true;
    }
  });
  Object.defineProperty(mediaProto, 'paused', {
    configurable: true,
    get() {
      return this._paused ?? true;
    },
    set(value) {
      this._paused = value;
    }
  });
  Object.defineProperty(mediaProto, 'load', {
    configurable: true,
    value() {}
  });
  Object.defineProperty(mediaProto, 'duration', {
    configurable: true,
    get() {
      return this._duration ?? NaN;
    },
    set(value) {
      this._duration = value;
    }
  });
  Object.defineProperty(mediaProto, 'currentTime', {
    configurable: true,
    get() {
      return this._currentTime ?? 0;
    },
    set(value) {
      this._currentTime = value;
    }
  });
  Object.defineProperty(mediaProto, 'buffered', {
    configurable: true,
    get() {
      return {
        length: this._bufferedRanges ? this._bufferedRanges.length : 0,
        end: (index) => this._bufferedRanges[index][1]
      };
    }
  });
  return dom;
}

function teardownDom(dom) {
  dom.window.close();
  delete globalThis.window;
  delete globalThis.document;
  delete globalThis.HTMLElement;
  delete globalThis.CustomEvent;
  delete globalThis.navigator;
}

function createPlayer(options = {}) {
  const dom = setupDom();
  const container = dom.window.document.getElementById('app');
  const player = new Mp4Player(container, {
    sources: [{ src: 'video.mp4', type: 'video/mp4' }],
    ...options
  });
  return { dom, player };
}

async function runTests() {
  {
    const { dom, player } = createPlayer();
    assert.ok(dom.window.document.querySelector('.mp4-player__video'), 'video element should exist');
    assert.equal(player.video.autoplay, false);
    player.video.duration = 120;
    player.video.currentTime = 0;
    player.seekBy(10);
    assert.equal(player.video.currentTime, 10);
    player.setVolume(0.3);
    assert.equal(Number(player.volumeInput.value).toFixed(1), '0.3');
    player.togglePlay();
    await Promise.resolve();
    assert.equal(player.video.paused, false, 'video should be playing');
    player.togglePlay();
    assert.equal(player.video.paused, true, 'video should be paused after toggle');
    player.destroy();
    assert.equal(dom.window.document.querySelector('.mp4-player'), null, 'player root removed after destroy');
    teardownDom(dom);
  }

  {
    const { dom, player } = createPlayer({ autoplay: true, volume: 1 });
    player.video.duration = 60;
    player.video._bufferedRanges = [[0, 15]];
    player._updateBuffered();
    assert.equal(player.bufferedBar.style.width, '25%', 'buffered bar width matches buffered range');
    player.setSource({ src: 'alternate.mp4', type: 'video/mp4' });
    assert.equal(player.video.querySelectorAll('source').length, 1);
    teardownDom(dom);
  }

  console.log('All Mp4Player tests passed');
}

runTests().catch((error) => {
  console.error(error);
  process.exitCode = 1;
});
