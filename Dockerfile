# Utiliser une image PHP avec Apache
FROM php:8.2-apache

# Installer les extensions nécessaires à Laravel + MySQL
RUN apt-get update && apt-get install -y \
    git unzip libzip-dev libpng-dev libonig-dev libxml2-dev zip \
    && docker-php-ext-install pdo pdo_mysql zip

# Activer le module rewrite d'Apache
RUN a2enmod rewrite

# Copier le projet Laravel
COPY . /var/www/html

# Définir le dossier de travail
WORKDIR /var/www/html

# Installer Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Installer les dépendances Laravel
RUN composer install --no-dev --optimize-autoloader

# Donner les permissions nécessaires
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Exposer le port 80
EXPOSE 8000

# Démarrer Apache
CMD ["apache2-foreground"]
