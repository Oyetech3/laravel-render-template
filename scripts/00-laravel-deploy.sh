#!/usr/bin/env bash
echo "Running composer"
composer install --no-dev --working-dir=/var/www/html

echo "Installing Node.js dependencies..."
npm install --prefix /var/www/html

echo "Building frontend assets..."
npm run build --prefix /var/www/html

echo "Checking build output..."
ls -la /var/www/html/public/build/

echo "Checking manifest content..."
cat /var/www/html/public/build/manifest.json

echo "Clearing and caching config..."
php artisan config:clear
php artisan config:cache

echo "Caching config..."
php artisan config:cache

echo "Caching routes..."
php artisan route:cache

echo "Running migrations..."
php artisan migrate --force

echo "Setting permissions for storage and bootstrap/cache..."
chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache
chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache || true
