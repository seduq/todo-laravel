#!/bin/bash

# Docker Setup Script for Laravel Application
# This script sets up the Docker environment with proper permissions

echo "🐳 Setting up Docker environment..."

# Stop and remove existing containers
echo "📦 Stopping existing containers..."
docker compose down -v

# Prune Docker system (optional - uncomment if needed)
# echo "🧹 Pruning Docker system..."
# docker system prune -a --volumes -f

# Copy .env.dev if .env does not exist
if [ ! -f .env ]; then
    echo "📄 Copying .env.dev to .env..."
    cp .env.dev .env
fi

# Build containers
echo "🔨 Building Docker images..."
docker compose build

# Start containers
echo "🚀 Starting containers..."
docker compose up -d

# Wait for containers to be ready
echo "⏳ Waiting for containers to be healthy..."
sleep 10

# Set permissions
echo "🔐 Setting proper permissions..."
docker compose exec app chmod -R 775 storage bootstrap/cache database
docker compose exec app chown -R www-data:www-data storage bootstrap/cache database

# Check if database file exists and set permissions
if docker compose exec app test -f database/database.sqlite; then
    docker compose exec app chmod 664 database/database.sqlite
    docker compose exec app chown www-data:www-data database/database.sqlite
fi

# Install Composer dependencies
echo "📚 Installing Composer dependencies..."
docker compose exec app composer install --no-interaction --prefer-dist --optimize-autoloader

# Generate application key if not set
echo "🔑 Generating application key..."
docker compose exec app php artisan key:generate --force

# Run migrations
echo "🗄️ Running database migrations..."
docker compose exec app php artisan migrate --force

# Clear caches
echo "🧹 Clearing caches..."
docker compose exec app php artisan config:clear
docker compose exec app php artisan cache:clear
docker compose exec app php artisan view:clear

# Show container status
echo ""
echo "✅ Setup complete! Container status:"
docker compose ps

echo ""
echo "🌐 Application is available at: http://localhost:80"
echo "📊 MySQL is available at: localhost:3306"
echo "🔴 Redis is available at: localhost:6379"
echo "⚡ Vite dev server at: http://localhost:5173"
