FROM php:8.3-fpm-alpine
RUN apk add php83-pdo_mysql mariadb-connector-c \
	&& docker-php-ext-install pdo_mysql
