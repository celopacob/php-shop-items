FROM php:8.0.5-apache
RUN docker-php-ext-install pdo pdo_mysql && docker-php-ext-enable pdo pdo_mysql
RUN apt-get update && apt-get upgrade -y

RUN echo "ServerName 127.0.0.1" | tee /etc/apache2/conf-available/fqdn.conf && \
a2enconf fqdn