# PHP-FPM Dockerfile
FROM php:8.3-fpm

# Arguments for user/group IDs
ARG USER_ID=1000
ARG GROUP_ID=1000

# Set working directory
WORKDIR /var/www/html

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    libzip-dev \
    libpq-dev

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip

# Install Redis extension
RUN pecl install redis && docker-php-ext-enable redis

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy application files
COPY . /var/www/html

# Dubious git safety fix
RUN git config --global --add safe.directory /var/www/html

# Create user with same UID/GID as host user
RUN groupmod -g ${GROUP_ID} www-data && \
    usermod -u ${USER_ID} -g ${GROUP_ID} www-data

# Set proper permissions
RUN mkdir -p /var/www/html/storage/logs \
    /var/www/html/storage/framework/sessions \
    /var/www/html/storage/framework/views \
    /var/www/html/storage/framework/cache \
    /var/www/html/bootstrap/cache \
    && chown -R www-data:www-data /var/www/html \
    && chmod -R 775 /var/www/html/storage \
    && chmod -R 775 /var/www/html/bootstrap/cache \
    && chmod -R 775 /var/www/html/database \
    && if [ -f /var/www/html/database/database.sqlite ]; then \
        chmod 664 /var/www/html/database/database.sqlite; \
    fi

# Expose port 9000 for PHP-FPM
EXPOSE 9000

CMD ["php-fpm"]
