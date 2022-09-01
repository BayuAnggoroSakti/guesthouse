FROM php:7.3.30-apache
RUN docker-php-ext-install mysqli
RUN a2enmod rewrite


RUN apt-get update \
 && DEBIAN_FRONTEND=noninteractive apt-get install -y ssl-cert \
 && rm -r /var/lib/apt/lists/*

RUN a2enmod ssl \
 && a2ensite default-ssl

EXPOSE 443
EXPOSE 80
COPY . /var/www/html