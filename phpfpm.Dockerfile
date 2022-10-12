FROM php:7.4-fpm
RUN docker-php-ext-install pdo pdo_mysql
RUN php -r "readfile('http://getcomposer.org/installer');" | php -- --install-dir=/usr/bin/ --filename=composer
RUN apt-get update -y
RUN apt-get upgrade -y
RUN alias composer='php /usr/bin/composer'


# Install unzip utility and libs needed by zip PHP extension 
RUN apt-get update && apt-get install -y \
    zlib1g-dev \
    libzip-dev \
    unzip
RUN docker-php-ext-install zip


RUN composer require firebase/php-jwt
RUN composer require phpmailer/phpmailer