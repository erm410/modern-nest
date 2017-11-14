FROM php:7.1-fpm

ADD http://nginx.org/keys/nginx_signing.key /nginx.key

RUN apt-key add /nginx.key \
	&& echo deb http://nginx.org/packages/debian/ jessie nginx >> /etc/apt/sources.list \
	&& echo deb-src http://nginx.org/packages/debian/ jessie nginx >> /etc/apt/sources.list \
	&& apt-get update && apt-get install -y nginx git node-less libpng-dev libjpeg62-turbo-dev \
	&& docker-php-ext-configure gd --with-jpeg-dir=/usr/include \
	&& docker-php-ext-install -j`nproc` mysqli gd opcache \
	&& cd /opt \
	&& curl -O https://download.newrelic.com/php_agent/archive/7.2.0.191/newrelic-php5-7.2.0.191-linux.tar.gz \
	&& tar -xzvf newrelic-php5-7.2.0.191-linux.tar.gz \
	&& cd newrelic-php5-7.2.0.191-linux \
	&& ./newrelic-install install \
	&& pear install --alldeps mail \
	&& chmod +x /entrypoint

COPY nginx/entrypoint /entrypoint
COPY nginx/update.sh /update.sh

EXPOSE 80

ENTRYPOINT ["/entrypoint"]

CMD ["php-fpm"]
