FROM php:7.4-fpm-alpine

WORKDIR /var/www/html

RUN mkdir public

COPY . .

RUN docker-php-ext-install pdo pdo_mysql

RUN apk add --no-cache $PHPIZE_DEPS \
    && pecl install xdebug-2.9.2 \
    && docker-php-ext-enable xdebug \
