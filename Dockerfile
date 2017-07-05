FROM php:7.1-fpm

COPY nginx/entrypoint /entrypoint

RUN apt-get update && apt-get install -y nginx git node-less \
  && pecl install redis \
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
