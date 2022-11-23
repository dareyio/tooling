FROM php:7-apache
LABEL MAINTAINER somex

RUN docker-php-ext-install mysqli
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
COPY apache-config.conf /etc/apache2/sites-available/000-default.conf
COPY start-apache /usr/local/bin
RUN a2enmod rewrite

# Copy application source
COPY html /var/www
# WORKDIR /var/www

# ADD html/tooling_db_schema.sql /docker-entrypoint-initdb.db

RUN chown -R www-data:www-data /var/www

ENV MYSQL_IP=db
ENV MYSQL_USER=somex
ENV MYSQL_PASS=password123
ENV MYSQL_DBNAME=toolingdb

CMD ["start-apache"]