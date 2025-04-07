FROM php:8.3-fpm

RUN apt-get update && apt-get install -y \
    libzip-dev \
    libpq-dev

RUN pecl install xdebug && docker-php-ext-enable xdebug

WORKDIR /var/www/app