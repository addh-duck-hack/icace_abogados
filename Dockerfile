FROM php:7.4-apache

# Instalar dependencias necesarias, incluido Composer
RUN apt-get update && apt-get install -y \
    unzip \
    git \
    && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer \
    && rm -rf /var/lib/apt/lists/*

# Instalar PHPMailer usando Composer
WORKDIR /var/www/html
RUN composer require phpmailer/phpmailer

# Copiar los archivos del proyecto
ADD public_html /var/www/html/
EXPOSE 80