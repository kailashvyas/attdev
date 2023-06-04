FROM node:latest AS node_base

RUN echo "NODE Version:" && node --version
RUN echo "NPM Version:" && npm --version

FROM php:8.1-fpm

RUN curl -sS https://getcomposer.org/installer | php \
    && mv composer.phar /usr/bin/composer

COPY --from=node_base / /

WORKDIR /var/www/symfony_docker