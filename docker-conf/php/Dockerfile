# Use the official PHP image as the base image
FROM php:8.3-cli

# Set the working directory inside the container
WORKDIR /var/www/html

# Install system dependencies, PHP extensions, and Composer
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libzip-dev \
    && docker-php-ext-install zip pdo pdo_mysql mysqli

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy your project files into the container
COPY ../.. /var/www/html

# Install project dependencies using Composer
RUN composer install --no-scripts --no-autoloader

# Expose port 8000
EXPOSE 8000

# Run PHP's built-in web server on port 8000
CMD ["php", "-S", "0.0.0.0:8000", "-t", "public"]
