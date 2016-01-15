FROM php:5.6-apache

MAINTAINER Andreas Ek <andreas@aekab.se>

RUN a2enmod rewrite

RUN apt-get update && apt-get install -y mysql-client libmysqlclient-dev

RUN pecl install xdebug

RUN docker-php-ext-enable xdebug

RUN docker-php-ext-install mysqli

COPY docker.conf /etc/apache2/sites-enabled/

EXPOSE 80
