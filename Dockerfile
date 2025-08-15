FROM php:8.2-apache

# PHP 확장 & Apache 모듈
RUN apt-get update && apt-get install -y \
    git unzip libzip-dev libpng-dev libonig-dev libxml2-dev libicu-dev libpq-dev \
    && docker-php-ext-configure intl \
    && docker-php-ext-install pdo pdo_mysql pdo_pgsql zip gd intl bcmath \
    && a2enmod rewrite headers \
    && rm -rf /var/lib/apt/lists/*

# DocumentRoot를 /public으로
ENV APACHE_DOCUMENT_ROOT=/var/www/html/public
RUN sed -ri 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' \
    /etc/apache2/sites-available/*.conf \
    /etc/apache2/apache2.conf \
    /etc/apache2/conf-available/*.conf

# /public에서 .htaccess가 동작하도록 허용
RUN printf '%s\n' \
  '<Directory /var/www/html/public>' \
  '    AllowOverride All' \
  '    Require all granted' \
  '</Directory>' \
  > /etc/apache2/conf-available/laravel-public.conf \
  && a2enconf laravel-public

# Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# composer 단계(빌드 시)에서는 스크립트 실행 금지(ENV 미주입 대비)
COPY composer.json composer.lock ./
RUN composer install --no-dev --prefer-dist --no-interaction --no-progress --no-scripts

# 애플리케이션 복사
COPY . .

# 권한
RUN chown -R www-data:www-data storage bootstrap/cache \
    && chmod -R 775 storage bootstrap/cache

# 컨테이너 시작(런타임) 시 artisan 명령 실행
# - 캐시/뷰/라우트 캐시를 지워서 최신 ENV(특히 APP_URL=https://...) 반영
# - storage:link는 이미 있으면 실패하므로 || true
CMD php artisan package:discover --ansi \
 && php artisan config:clear \
 && php artisan cache:clear \
 && php artisan view:clear \
 && php artisan route:clear \
 && php artisan storage:link || true \
 && apache2-foreground
