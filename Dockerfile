# Use official lightweight PHP 8.2 with Apache
FROM php:8.2-apache

# Set working directory to Apache web root
WORKDIR /var/www/html

# Enable Apache rewrite module for clean URL handling
RUN a2enmod rewrite

# Configure Apache to listen on Render's dynamic PORT environment variable (default: 80 or 10000)
# Render injects $PORT at runtime, so we bind Apache dynamically via an entrypoint script
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

# Copy all application files to Apache root
COPY . /var/www/html/

# Set proper ownership and file permissions for www-data
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# Expose port (Render automatically maps the container port)
EXPOSE 80 10000

# Start Apache with dynamic $PORT binding for Render
CMD sh -c "sed -i \"s/80/\${PORT:-80}/g\" /etc/apache2/ports.conf /etc/apache2/sites-available/000-default.conf && apache2-foreground"
