#!/bin/bash
echo "Running composer install"
composer install --no-dev --optimize-autoloader

echo "Running npm install"
npm install

echo "Running npm build"
npm run prod

echo "Generating Laravel APP_KEY"
php artisan key:generate

echo "Running database migrations"
php artisan migrate --force
