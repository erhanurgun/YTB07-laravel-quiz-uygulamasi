# PHP base image
FROM php:8.1.0-apache

# Apache Rewrite Module'ünü etkinleştirin
RUN a2enmod rewrite

# PHP eklentilerini yükleyin
RUN docker-php-ext-install pdo_mysql

# Composer'ı yükleyin
COPY --from=composer:2.1 /usr/bin/composer /usr/bin/composer

# Proje dosyalarını Docker imajına kopyalayın
COPY . /var/www/html

# Proje dizinine geçin
WORKDIR /var/www/html

# Node.js kurulumu
RUN curl -sL https://deb.nodesource.com/setup_18.x | bash -
RUN apt-get install -y nodejs

# Composer paketlerini yükleyin
RUN composer install

# Uygulama anahtarını oluşturun
RUN php artisan key:generate

# Node.js paketlerini yükleme
RUN npm install -g pnpm@latest
RUN pnpm install --frozen-lockfile

# Uygulama watch modunda çalıştırın
#RUN pnpm run watch

# Projeyi çalıştırmak için gerekli izinleri ayarlayın
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Apache'yi başlatın
CMD ["apache2-foreground"]
