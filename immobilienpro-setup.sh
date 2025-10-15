#!/usr/bin/env bash
set -euo pipefail

WP_VERSION="6.5"
DB_NAME="immobilienpro"
DB_USER="immobilien_user"
DB_PASS="strongP@ssw0rd"
SITE_DIR="/var/www/html/immobilienpro"
VHOST_CONF="/etc/apache2/sites-available/immobilienpro.conf"
WP_TARBALL="/tmp/wordpress-${WP_VERSION}.tar.gz"

sudo apt-get update
sudo apt-get install -y apache2 mysql-server php8.1 php8.1-fpm php8.1-mysql \
    php8.1-xml php8.1-curl php8.1-json php8.1-mbstring php8.1-zip php8.1-gd \
    php8.1-bcmath php8.1-intl unzip curl wget libapache2-mod-fcgid

sudo a2enmod proxy_fcgi setenvif rewrite headers expires
sudo a2enconf php8.1-fpm || true

if [ ! -d "${SITE_DIR}" ]; then
  sudo mkdir -p "${SITE_DIR}"
fi

sudo systemctl enable --now mysql

sudo mysql <<MYSQL
CREATE DATABASE IF NOT EXISTS \
  \`${DB_NAME}\` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
CREATE USER IF NOT EXISTS \`${DB_USER}\`@'localhost' IDENTIFIED BY '${DB_PASS}';
GRANT ALL PRIVILEGES ON \`${DB_NAME}\`.* TO \`${DB_USER}\`@'localhost';
FLUSH PRIVILEGES;
MYSQL

if [ -f "${VHOST_CONF}" ]; then
  sudo a2dissite immobilienpro.conf || true
fi

sudo tee "${VHOST_CONF}" >/dev/null <<APACHE
<VirtualHost *:80>
    ServerName localhost
    DocumentRoot ${SITE_DIR}

    <Directory ${SITE_DIR}>
        AllowOverride All
        Require all granted
    </Directory>

    ErrorLog \${APACHE_LOG_DIR}/immobilienpro_error.log
    CustomLog \${APACHE_LOG_DIR}/immobilienpro_access.log combined

    ProxyPassMatch "^/(.*\\.php(/.*)?)$" "unix:/run/php/php8.1-fpm.sock|fcgi://localhost/${SITE_DIR}/"
</VirtualHost>
APACHE

sudo a2ensite immobilienpro.conf
sudo a2dissite 000-default.conf || true

if [ -d "${SITE_DIR}" ] && [ "$(ls -A ${SITE_DIR} 2>/dev/null)" ]; then
  echo "${SITE_DIR} is not empty. Skipping WordPress download." >&2
else
  wget -qO "${WP_TARBALL}" "https://wordpress.org/wordpress-${WP_VERSION}.tar.gz"
  sudo tar -xzf "${WP_TARBALL}" -C /tmp
  sudo rm -rf "${SITE_DIR}"
  sudo mv /tmp/wordpress "${SITE_DIR}"
fi

if [ ! -f "${SITE_DIR}/wp-config.php" ]; then
  sudo cp "${SITE_DIR}/wp-config-sample.php" "${SITE_DIR}/wp-config.php"
  sudo sed -i "s/database_name_here/${DB_NAME}/" "${SITE_DIR}/wp-config.php"
  sudo sed -i "s/username_here/${DB_USER}/" "${SITE_DIR}/wp-config.php"
  sudo sed -i "s/password_here/${DB_PASS}/" "${SITE_DIR}/wp-config.php"
  SALTS=$(curl -fsSL https://api.wordpress.org/secret-key/1.1/salt/)
  if [ -n "${SALTS}" ]; then
    for KEY in AUTH_KEY SECURE_AUTH_KEY LOGGED_IN_KEY NONCE_KEY AUTH_SALT SECURE_AUTH_SALT LOGGED_IN_SALT NONCE_SALT; do
      sudo sed -i "/define( '${KEY}'/d" "${SITE_DIR}/wp-config.php"
    done
    printf '%s\n' "${SALTS}" | sudo tee -a "${SITE_DIR}/wp-config.php" >/dev/null
  fi
  sudo sed -i "s/define( 'WP_DEBUG', false );/define( 'WP_DEBUG', true );/" "${SITE_DIR}/wp-config.php"
fi

sudo mkdir -p "${SITE_DIR}/wp-content/themes"
sudo rm -rf "${SITE_DIR}/wp-content/themes/immobilienpro"
sudo cp -R "$(pwd)/immobilienpro-theme/wp-content/themes/immobilienpro" "${SITE_DIR}/wp-content/themes/"

sudo tee "${SITE_DIR}/.htaccess" >/dev/null <<'HTACCESS'
# BEGIN WordPress
<IfModule mod_rewrite.c>
RewriteEngine On
RewriteBase /
RewriteRule ^index\.php$ - [L]
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule . /index.php [L]
</IfModule>
# END WordPress
HTACCESS

sudo chown -R www-data:www-data "${SITE_DIR}"

sudo systemctl restart apache2
sudo systemctl restart mysql
sudo systemctl restart php8.1-fpm

echo "Installation complete. Visit http://localhost to finish WordPress setup."
