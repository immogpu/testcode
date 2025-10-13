#!/bin/bash
set -euo pipefail

if [[ "${VNC_PASSWORD:-}" == "" ]]; then
  echo "Error: VNC_PASSWORD environment variable must be set." >&2
  exit 1
fi

mkdir -p /root/.vnc

echo "$VNC_PASSWORD" | vncpasswd -f > /root/.vnc/passwd
chmod 600 /root/.vnc/passwd

if [[ ! -f /root/.vnc/xstartup ]]; then
  cat <<'XEOF' > /root/.vnc/xstartup
#!/bin/sh
unset SESSION_MANAGER
unset DBUS_SESSION_BUS_ADDRESS
startxfce4 &
XEOF
  chmod +x /root/.vnc/xstartup
fi

export USER="root"
export DISPLAY=":1"

if tigervncserver -list | grep -q "^:1"; then
  tigervncserver -kill :1 >/dev/null 2>&1 || true
fi

exec tigervncserver -fg :1 \
  -localhost no \
  -geometry "${VNC_GEOMETRY}" \
  -depth "${VNC_DEPTH}" \
  -rfbport "${VNC_PORT}" \
  -SecurityTypes VncAuth
