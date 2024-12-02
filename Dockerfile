FROM php:8.1-fpm

# Composer o'rnatish
RUN apt-get update && apt-get install -y \
    git unzip libpq-dev \
    && docker-php-ext-install pdo pdo_mysql

# Composerni o'rnatish
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Loyihani konteynerga ko'chirish
WORKDIR /var/www
COPY . /var/www

# Chiqish nuqtasi
CMD php artisan serve --host=0.0.0.0 --port=10000
