FROM php:8.0-apache

RUN apt update \
    && apt install -y \
    g++ \
    libicu-dev \
    libpq-dev \
    libzip-dev \
    zip \
    zlib1g-dev \
    && docker-php-ext-install \
    intl \
    opcache \
    pdo \
    pdo_pgsql \
    pgsql

WORKDIR /var/www/laravel_docker

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN cp /etc/apache2/mods-available/rewrite.load /etc/apache2/mods-enabled/

RUN curl -sL https://deb.nodesource.com/setup_12.x | bash - 
RUN apt install -y nodejs