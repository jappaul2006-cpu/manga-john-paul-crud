# Gamitin ang opisyal na PHP image na may kasamang Apache
FROM php:8.2-apache

# I-install ang mga kinakailangang PHP extensions (tulad ng mysqli para sa database)
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Paganahin ang Apache rewrite module para sa clean URLs ng LavaLust
RUN a2enmod rewrite

# Kopyahin ang mga project files papunta sa Apache web directory
COPY . /var/www/html/

# Baguhin ang permission kung kinakailangan
RUN chown -R www-data:www-data /var/www/html

# I-expose ang port 80 para ma-access sa browser
EXPOSE 80