FROM php:8.4-fpm-alpine

# Install necessary dependencies
RUN apk add --no-cache \
    bash \
    zip \
    unzip \
    curl \
    libpq \
    git \
    postgresql-dev \
    && docker-php-ext-install pdo pdo_pgsql

# Copy Composer binary from the official Composer image
COPY --from=composer/composer:latest-bin /composer /usr/bin/composer

# Set the Composer timeout to 30 minutes
RUN composer config --global process-timeout 1800

# Mark working directory as a safe directory for git from the container
RUN git config --global --add safe.directory /var/www

# Set the working directory
WORKDIR /var/www

# Expose port for PHP-FPM
EXPOSE 9000

CMD ["php-fpm"]
