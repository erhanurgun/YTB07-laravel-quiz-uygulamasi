# PHP taban imajını kullan
FROM php:8.1.0-apache

# Gerekli bağımlılıkları yükle
RUN apt-get update \
    && apt-get install -y \
        libonig-dev \
        libxml2-dev \
        libzip-dev \
        unzip \
    && docker-php-ext-install -j$(nproc) \
        pdo \
        pdo_mysql \
        mbstring \
        xml \
        zip

# Composer'ı yükle
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Projeyi kopyala
COPY ../.. /var/www/html

# Gerekli dosyaları ve dizinleri ayarla
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
RUN chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Apache'nin rewrite modülünü etkinleştir
RUN a2enmod rewrite

CMD ["apache2-foreground"]
