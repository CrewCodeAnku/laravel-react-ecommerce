FROM php:8.0.0-fpm-alpine

WORKDIR /var/www/html

RUN docker-php-ext-install pdo pdo_mysql

RUN apk add --update --no-cache freetype libpng libjpeg-turbo freetype-dev libpng-dev libjpeg-turbo-dev libwebp-dev \
    && docker-php-ext-configure gd \
    --with-freetype \
    --with-jpeg \
    --with-webp \
    NPROC=$(grep -c ^processor /proc/cpuinfo 2>/dev/null || 1) \
    && docker-php-ext-install -j$(nproc) gd \
    && apk del --no-cache freetype-dev libpng-dev libjpeg-turbo-dev \
    && mkdir /var/lib/php  \
    && chown www-data:www-data /var/lib/php -R

