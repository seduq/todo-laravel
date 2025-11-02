# Node.js with PHP for Vite + Laravel Wayfinder
FROM node:20-alpine

# Arguments for user/group IDs
ARG USER_ID=1000
ARG GROUP_ID=1000

# Install PHP and required extensions for Laravel Wayfinder
RUN apk add --no-cache \
    php83 \
    php83-cli \
    php83-phar \
    php83-mbstring \
    php83-tokenizer \
    php83-fileinfo \
    php83-xml \
    php83-xmlwriter \
    php83-simplexml \
    php83-dom \
    php83-session \
    php83-zip \
    php83-pdo \
    php83-pdo_mysql \
    php83-openssl \
    php83-curl

# Create symlink for php command
RUN ln -sf /usr/bin/php83 /usr/bin/php

# Update node user to match host user
RUN deluser --remove-home node 2>/dev/null || true \
    && addgroup -g ${GROUP_ID} nodeuser \
    && adduser -D -u ${USER_ID} -G nodeuser nodeuser

# Set working directory
WORKDIR /var/www/html

# Switch to non-root user
USER nodeuser

# Expose Vite dev server port
EXPOSE 5173

# Run Vite dev server with hot reload
CMD ["sh", "-c", "npm install && npm run dev -- --host 0.0.0.0"]
