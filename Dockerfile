FROM php:8.2-apache

# Cài extension cần thiết
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Enable rewrite (nếu dùng .htaccess)
RUN a2enmod rewrite

# Copy source code
COPY ./src /var/www/html/

# Phân quyền
RUN chown -R www-data:www-data /var/www/html
