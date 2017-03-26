FROM wordpress

RUN pecl install redis \
	&& echo "extension=redis.so" > /usr/local/etc/php/conf.d/redis.ini \
	&& a2enmod headers \
	&& cd /opt \
	&& curl -O https://download.newrelic.com/php_agent/release/newrelic-php5-7.1.0.187-linux.tar.gz \
	&& tar -xzvf newrelic-php5-7.1.0.187-linux.tar.gz \
	&& cd newrelic-php5-7.1.0.187-linux \
	&& ./newrelic-install install

EXPOSE 80
