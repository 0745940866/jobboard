FROM php:8.2-apache

# Install required PHP extensions and dependencies
RUN apt-get update && apt-get install -y \
    git curl unzip libpng-dev libonig-dev libxml2-dev zip sqlite3 libsqlite3-dev \
    && docker-php-ext-install pdo pdo_mysql pdo_sqlite mbstring exif pcntl bcmath gd

# Enable Apache rewrite module
RUN a2enmod rewrite

# Set working directory
WORKDIR /var/www/html

# Copy everything
COPY . .

# Set Laravel public directory as Apache root
RUN sed -i 's|DocumentRoot /var/www/html|DocumentRoot /var/www/html/public|' /etc/apache2/sites-available/000-default.conf

# Fix permissions (especially for storage and bootstrap/cache)
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Install dependencies and optimize
RUN composer install --no-interaction --prefer-dist --optimize-autoloader
RUN php artisan config:clear && php artisan cache:clear && php artisan route:clear
RUN php artisan migrate --force



EXPOSE 80
CMD ["apache2-foreground"]
