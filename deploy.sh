#!/bin/bash

set -e

echo "=========================================="
echo "Starting Glowithsya production deployment"
echo "=========================================="

cd "$HOME/glowithsya"

echo ""
echo "[1/5] Installing Composer dependencies..."

composer install \
  --no-interaction \
  --prefer-dist \
  --optimize-autoloader

echo ""
echo "[2/5] Generating Laravel application key..."

php artisan key:generate --force

echo ""
echo "[3/5] Running database migrations..."

php artisan migrate --force

echo ""
echo "[4/5] Clearing Laravel cache..."

php artisan optimize:clear

echo ""
echo "[5/5] Building Laravel configuration cache..."

php artisan config:cache

echo ""
echo "=========================================="
echo "Glowithsya deployment completed successfully"
echo "=========================================="