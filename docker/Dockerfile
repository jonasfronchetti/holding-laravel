FROM php:7.2-apache

RUN apt-get update

# 1. pacotes de desenvolvimento
RUN apt-get install -y \
    git \
    zip \
    curl \
    sudo \
    unzip \
    libicu-dev \
    libbz2-dev \
    libpng-dev \
    libjpeg-dev \
    libmcrypt-dev \
    libreadline-dev \
    libfreetype6-dev \
    g++ \
    libpq-dev

# 2. apache configs  document root
ENV APACHE_DOCUMENT_ROOT=/var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# 3. mod_rewrite
RUN a2enmod rewrite headers

# 4. comece com a configuração de php base, em seguida, adicione extensões
RUN mv "$PHP_INI_DIR/php.ini-development" "$PHP_INI_DIR/php.ini"

RUN docker-php-ext-install \
    bz2 \
    intl \
    iconv \
    bcmath \
    opcache \
    calendar \
    mbstring \
    pdo \
    pdo_pgsql \
    zip \
    gd

# 5. composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer


ARG uid
RUN useradd -G www-data,root -u $uid -d /home/devuser devuser
RUN mkdir -p /home/devuser/.composer && \
    chown -R devuser:devuser /home/devuser

# Seta o diretório de trabalho
RUN mkdir storage/ && \
    mkdir bootstrap/ && \
    chmod -R 777 storage/ && \
    chown -R www-data: storage bootstrap

# Configura o time zone
ENV TZ America/Sao_Paulo
