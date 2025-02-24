#!/bin/sh

if [ ! -f "/var/www/.docker/.setup_done" ]; then
    # Navigate to the Laravel application directory
    cd /var/www

    # Check if the .env file exists, if not, copy from .env.example
    if [ ! -f ".env" ]; then
        echo "Copiando .env.example a .env"
        cp .env.example .env || exit 1
    fi

    # Update database configuration in .env file
    echo "Actualizando la configuración de la BD..."
    sed -i 's/^DB_CONNECTION=.*/DB_CONNECTION=pgsql/' .env &&
    sed -i 's/^# \?DB_HOST=.*/DB_HOST=postgres/' .env &&
    sed -i 's/^# \?DB_PORT=.*/DB_PORT=5432/' .env &&
    sed -i 's/^# \?DB_DATABASE=.*/DB_DATABASE=mycloud/' .env &&
    sed -i 's/^# \?DB_USERNAME=.*/DB_USERNAME=mycloud/' .env &&
    sed -i 's/^# \?DB_PASSWORD=.*/DB_PASSWORD=mycloud123/' .env || exit 1

    # Install composer dependencies
    echo "Instalando dependencias de Composer..."
    composer install || exit 1

    # Generate application key
    if [ ! -f "storage/oauth-private.key" ]; then
        echo "Generando application key..."
        php artisan key:generate || exit 1
    fi

    # Run migrations
    echo "Ejecutando migrations..."
    php artisan migrate --force || exit 1

    # Install Node.js dependencies
    if [ -f "package.json" ]; then
        echo "Instalando dependencias de Node.js..."
        npm install || exit 1
    fi

    # Create flag to indicate setup is done, only if all previous commands succeeded
    touch ./.docker/.setup_done && echo "===>>> CONFIGURACIÓN INICIAL COMPLETADA."
else
    echo "===>>> CONFIGURACIÓN INICIAL OMITIDA."

    # Install composer dependencies
    echo "Instalando dependencias de Composer..."
    composer install || exit 1

    echo "===>>> CONFIGURACIÓN COMPLETADA."
fi

# Run the original PHP-FPM command
exec "$@"

