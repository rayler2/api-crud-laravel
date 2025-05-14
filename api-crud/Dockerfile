# Utilisation d'une image de base PHP avec Apache
# Utilisation de l'image officielle PHP avec Apache

FROM php:8.3-apache

# Installer les extensions PHP nécessaires
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Changer le DocumentRoot vers /public
RUN sed -i 's|DocumentRoot /var/www/html|DocumentRoot /var/www/html/public|' /etc/apache2/sites-available/000-default.conf

# Ajouter les droits d'accès pour Laravel (AllowOverride All + Require all granted)
RUN echo '<Directory /var/www/html/public>\n\
    AllowOverride All\n\
    Require all granted\n\
</Directory>' >> /etc/apache2/apache2.conf

# Copier les fichiers du projet
#COPY . /var/www/html pas besoin de cette ligne car on va le faire dans le docker-compose!

# Installer Composer en la copiant depuis l'image officielle
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Activer mod_rewrite d’Apache (pour les routes Laravel)
RUN a2enmod rewrite

# Donner les droits
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# Travailler depuis le bon dossier en definissant le repertoire de travail
WORKDIR /var/www/html

# Exposition du port de travail
EXPOSE 80
