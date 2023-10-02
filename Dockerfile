# Use an official PHP runtime as a parent image
FROM php:8.2.11-apache

# Set the working directory in the container
WORKDIR /var/www/html

# Install required PHP extensions and other dependencies
RUN apt-get update && \
    apt-get install -y libpq-dev && \
    docker-php-ext-install pdo pdo_pgsql

# Copy your PHP application code into the container
COPY ./ /var/www/html

# Expose port 80 for Apache web server
EXPOSE 8888

# Start Apache web server
CMD ["apache2-foreground"]
