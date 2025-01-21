FROM php:8-apache

RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"
RUN docker-php-ext-install pdo_mysql

COPY . /var/www/html

RUN chown -R www-data:www-data /var/www/html

USER www-data
