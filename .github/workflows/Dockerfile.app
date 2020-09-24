# Dockerfile
FROM php:7.4-apache

ENV COMPOSER_ALLOW_SUPERUSER=1

EXPOSE 80
WORKDIR /app

# git, unzip & zip are for composer
RUN apt-get update -qq && \
    apt-get install -qy \
    git \
    wget \
    gnupg \
    unzip \
    zip \ 
    libmagickwand-dev --no-install-recommends && \
    curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer && \
    apt-get clean && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

# PHP Extensions
RUN docker-php-ext-install -j$(nproc) opcache pdo_mysql
COPY docker/apache/conf/php.ini /usr/local/etc/php/conf.d/app.ini
COPY app/ /app
RUN pecl install imagick && docker-php-ext-enable imagick

RUN wget https://get.symfony.com/cli/installer -O - | bash

RUN mv /root/.symfony/bin/symfony /usr/local/bin/symfony

# Apache
COPY docker/errors /errors
COPY docker/apache/conf/vhost.conf /etc/apache2/sites-available/000-default.conf
COPY docker/apache/conf/apache.conf /etc/apache2/conf-available/z-app.conf


RUN a2enmod rewrite remoteip && \
    a2enconf z-app