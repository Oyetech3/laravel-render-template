FROM richarvey/nginx-php-fpm:latest

# Install Node.js (Alpine Linux uses 'apk' instead of 'apt-get')
RUN apk update && apk add --no-cache \
    curl \
    nodejs \
    npm

# Install Yarn (optional)
RUN npm install -g yarn

COPY . .

# Image config (keep existing)
ENV SKIP_COMPOSER 1
ENV WEBROOT /var/www/html/public
ENV PHP_ERRORS_STDERR 1
ENV RUN_SCRIPTS 1
ENV REAL_IP_HEADER 1

# Laravel config
ENV APP_ENV production
ENV APP_DEBUG false
ENV LOG_CHANNEL stderr

# Allow composer to run as root
ENV COMPOSER_ALLOW_SUPERUSER 1

# Build frontend assets (if needed)
RUN npm install && npm run build

CMD ["/start.sh"]
