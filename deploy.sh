#!/bin/bash

set -e

echo "=========================================="
echo "Starting Glowithsya deployment failure test"
echo "=========================================="

cd "$HOME/glowithsya"

echo ""
echo "[FAILURE TEST] Running Laravel before Composer..."

php artisan key:generate --force

echo ""
echo "Installing Composer dependencies..."

composer install \
  --no-interaction \
  --prefer-dist \
  --optimize-autoloader

echo ""
echo "Running database migrations..."

php artisan migrate --force

echo ""
echo "Clearing Laravel cache..."

php artisan optimize:clear

echo ""
echo "Building Laravel configuration cache..."

php artisan config:cache

echo ""
echo "Deployment completed."