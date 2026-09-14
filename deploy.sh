#!/bin/bash

set -e

echo "Starting Glowithsya deployment..."

cd "$HOME/glowithsya"

echo "Installing Composer dependencies..."
composer install \
  --no-interaction \
  --prefer-dist \
  --optimize-autoloader

echo "Running Laravel migrations..."
php artisan migrate --force

echo "Clearing Laravel cache..."
php artisan optimize:clear

echo "Building application cache..."
php artisan config:cache

echo "Deployment completed successfully."