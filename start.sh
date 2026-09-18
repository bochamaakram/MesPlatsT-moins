#!/bin/bash

set -e

PROJECT_DIR="$(cd "$(dirname "$0")" && pwd)"
cd "$PROJECT_DIR"

echo "==> Cabinet BEROCERT CONSULTING - Starting..."

# Ensure .env exists
[ -f .env ] || cp .env.example .env

# Generate app key if missing
php artisan key:generate --force 2>/dev/null || true

# Ensure SQLite database exists
touch database/database.sqlite

# Install PHP dependencies
composer install --no-interaction --prefer-dist --quiet

# Run migrations
php artisan migrate --force --quiet

# Install Node dependencies
npm install --quiet 2>/dev/null

# Build frontend assets
npm run build --quiet 2>/dev/null

# Clear and cache config
php artisan config:cache 2>/dev/null || true

echo ""
echo "==> Starting Laravel development server on http://localhost:8000"
echo "==> Press Ctrl+C to stop."
echo ""

php artisan serve --host=0.0.0.0 --port=8000
