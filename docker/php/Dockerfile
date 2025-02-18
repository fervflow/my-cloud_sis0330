FROM php:8.4-fpm-alpine

# Install necessary dependencies
RUN apk add --no-cache \
    bash \
    zip \
    unzip \
    curl \
    libpq \
    postgresql-dev \
    && docker-php-ext-install pdo pdo_pgsql

# Copy Composer binary from the official Composer image
COPY --from=composer/composer:latest-bin /composer /usr/bin/composer

# Set the working directory
WORKDIR /var/www

# Expose port for PHP-FPM
EXPOSE 9000

CMD ["php-fpm"]
