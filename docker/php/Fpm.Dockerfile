FROM php:8.3-fpm

RUN apt-get update && apt-get install -y \
    libzip-dev \
    libpq-dev

WORKDIR /var/www/app