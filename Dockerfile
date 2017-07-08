FROM php:7.1-fpm

COPY nginx/entrypoint /entrypoint
COPY nginx/update.sh /update.sh

ADD http://nginx.org/keys/nginx_signing.key /nginx.key

RUN apt-key add /nginx.key \
	&& echo deb http://nginx.org/packages/mainline/debian/ jessie nginx >> /etc/apt/sources.list \
	&& echo deb-src http://nginx.org/packages/mainline/debian/ jessie nginx >> /etc/apt/sources.list \
	&& apt-get update && apt-get install -y nginx git node-less libpng-dev libjpeg62-turbo-dev \
	&& pecl install redis \
	&& docker-php-ext-configure gd --with-jpeg-dir=/usr/include \
	&& docker-php-ext-install mysqli gd opcache \
	&& docker-php-ext-enable redis \
	&& cd /opt \
	&& curl -O https://download.newrelic.com/php_agent/archive/7.2.0.191/newrelic-php5-7.2.0.191-linux.tar.gz \
	&& tar -xzvf newrelic-php5-7.2.0.191-linux.tar.gz \
	&& cd newrelic-php5-7.2.0.191-linux \
	&& ./newrelic-install install \
	&& pear install --alldeps mail \
	&& chmod +x /entrypoint

EXPOSE 80

ENTRYPOINT ["/entrypoint"]

CMD ["php-fpm"]
