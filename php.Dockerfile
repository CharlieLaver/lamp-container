FROM php:7.4.3-apache
RUN docker-php-ext-install mysqli pdo pdo_mysql
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composerls