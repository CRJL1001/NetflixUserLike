
#version de php

FROM php:8.2-apache 

#installation des extensions php nécessaires

RUN apt-get update && apt-get install -y \
    libzip-dev \
    zip \
    unzip \
    git \
    curl \
    libpq-dev \
    libssl-dev \
    && docker-php-ext-install pdo pdo_mysql zip 

#installation du gestionnaire de dépendance php -> Composer

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=Composer

#configuration de apache ( executeur php)

RUN sed -i 's|/var/www/html|/var/www/html/public|g' /etc/apache2/sites-available/000-default.conf
RUN mkdir -p /var/www/html/public 

#définition du répertoire de travail 

WORKDIR /var/www/html

#copier les fichiers php dans le conteneur

COPY . . 

# donner les permissions à Apache 
RUN chown -R www-data:www-data /var/www/html
RUN a2enmod rewrite

#exposer le port 80 

EXPOSE 80

#lancer appache 
CMD ["apache2-foreground"]

