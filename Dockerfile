# Use an official PHP runtime as a parent image
FROM php:8.2-fpm

# Set the working directory to /var/www/html
WORKDIR /var/www/html

# Copy the current directory contents into the container at /var/www/html
COPY ./crm /var/www/html

# Install any needed packages specified in requirements.txt
# For example, if you are using Composer for PHP dependencies
# RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
# RUN composer install

# Expose port 9000 for PHP-FPM
EXPOSE 9000

# CMD specifies the command to run on container start
CMD ["php-fpm"]
