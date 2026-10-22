# Las dependencias PHP se instalan en una etapa con la imagen oficial de Composer.
# Antes se hacía con apt-get dentro de php:7.4-apache, pero esa imagen está basada
# en Debian bullseye (fin de soporte) y sus repositorios de seguridad ya devuelven
# 404, rompiendo el build.
# PHP fijado en 8.3.36: primera versión de la rama 8.3 con el parche de PHP2Shell
# (CVE-2026-109618 / CVE-2026-109619). 7.4 no tiene imagen oficial parcheada.
FROM composer:2 AS vendor
WORKDIR /app
# Resolver dependencias compatibles con el PHP de la imagen final, no con el de Composer
RUN echo '{}' > composer.json \
    && composer config platform.php 8.3.36 \
    && composer require phpmailer/phpmailer --no-interaction --no-progress

FROM php:8.3.36-apache

WORKDIR /var/www/html
COPY --from=vendor /app/vendor /var/www/html/vendor

# Copiar los archivos del proyecto
ADD public_html /var/www/html/
EXPOSE 80
