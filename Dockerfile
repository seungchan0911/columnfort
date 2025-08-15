FROM php:8.2-apache

RUN apt-get update && apt-get install -y \
    git unzip libzip-dev libpng-dev libonig-dev libxml2-dev libicu-dev libpq-dev \
    && docker-php-ext-configure intl \
    && docker-php-ext-install pdo pdo_mysql pdo_pgsql zip gd intl bcmath \
    && a2enmod rewrite headers \
    && rm -rf /var/lib/apt/lists/*

ENV APACHE_DOCUMENT_ROOT=/var/www/html/public
RUN sed -ri 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' \
    /etc/apache2/sites-available/*.conf \
    /etc/apache2/apache2.conf \
    /etc/apache2/conf-available/*.conf

# Composer 바이너리
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# 빌드 단계: artisan 스크립트 실행 금지 (ENV 미주입 대비)
# ❗ composer.lock이 없다면 아래 줄을 'COPY composer.json ./' 로 바꿔도 됨
COPY composer.json composer.lock ./
RUN composer install --no-dev --prefer-dist --no-interaction --no-progress --no-scripts

# 앱 코드 복사
COPY . .

# 권한
RUN chown -R www-data:www-data storage bootstrap/cache \
    && chmod -R 775 storage bootstrap/cache

# 런타임에서 artisan 실행 (이때 ENV가 주입됨)
CMD php artisan package:discover --ansi \
 && php artisan config:cache \
 && php artisan route:cache \
 && apache2-foreground
