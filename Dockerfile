# ----------- Base image PHP + Apache ------------
FROM php:8.2-apache

# ----------- Installer dépendances nécessaires ------------
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libzip-dev \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    curl \
    && docker-php-ext-install pdo pdo_mysql zip

# ----------- Activer rewrite pour Laravel ------------
RUN a2enmod rewrite

# ----------- Copier le code Laravel dans le container ------------
COPY . /var/www/html
WORKDIR /var/www/html

# ----------- Installer Composer ------------
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer
RUN composer install --no-dev --optimize-autoloader

# ----------- Permissions ------------
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# ----------- Configurer Apache pour Koyeb ---------
# Apache par défaut écoute sur le port 80, on change vers 8000
RUN sed -i 's/80/8000/' /etc/apache2/ports.conf /etc/apache2/sites-available/000-default.conf

# ----------- Exposer le port utilisé par Koyeb ------------
EXPOSE 8000

# ----------- Commande de démarrage ------------
CMD ["apache2-foreground"]
