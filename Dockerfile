FROM debian:bookworm

ENV DEBIAN_FRONTEND=noninteractive \
    VNC_GEOMETRY=1280x800 \
    VNC_DEPTH=24 \
    VNC_PORT=5901

RUN apt-get update \
    && apt-get install -y --no-install-recommends \
        tigervnc-standalone-server \
        xfce4 \
        xfce4-terminal \
        dbus-x11 \
        x11-xserver-utils \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

COPY docker-entrypoint.sh /usr/local/bin/docker-entrypoint.sh
RUN chmod +x /usr/local/bin/docker-entrypoint.sh

EXPOSE 5901

ENTRYPOINT ["/usr/local/bin/docker-entrypoint.sh"]
CMD []
