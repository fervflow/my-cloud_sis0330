#!/bin/sh

if [ ! -f ".setup_done" ]; then
        # Navigate to the Laravel application directory
    cd /var/www

    # Check if the .env file exists, if not, copy from .env.example
    if [ ! -f ".env" ]; then
        echo "Copiando .env.example a .env"
        cp .env.example .env
    fi

    # Update database configuration in .env file
    echo "Actualizando la configuración de la BD..."
    sed -i '/^DB_CONNECTION=/,+5d' .env && tee -a .env > /dev/null <<EOL
DB_CONNECTION=pgsql
DB_HOST=postgres
DB_PORT=5432
DB_DATABASE=mycloud
DB_USERNAME=mycloud
DB_PASSWORD=mycloud123
EOL

    # Install composer dependencies
    if [ ! -d "vendor" ]; then
        echo "Instalando dependencias de Composer..."
        composer install
    fi

    # Generate application key
    if [ ! -f "storage/oauth-private.key" ]; then
        echo "Generando application key..."
        php artisan key:generate
    fi

    # Run migrations
    echo "Ejecutando migrations..."
    php artisan migrate --force

    # Install Node.js dependencies
    if [ -f "package.json" ]; then
        echo "Instalando dependencias de Node.js..."
        npm install
    fi

    # Create flag to indicate setup is done
    touch .setup_done

    echo "Configuración inicial completada."
fi

# Run the original PHP-FPM command
exec "$@"

