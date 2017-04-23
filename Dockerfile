FROM wordpress

RUN pecl install redis \
	&& echo "extension=redis.so" > /usr/local/etc/php/conf.d/redis.ini \
	&& a2enmod headers \
	&& cd /opt \
	&& curl -O https://download.newrelic.com/php_agent/archive/7.2.0.191/newrelic-php5-7.2.0.191-linux.tar.gz \
	&& tar -xzvf newrelic-php5-7.2.0.191-linux.tar.gz \
	&& cd newrelic-php5-7.2.0.191-linux \
	&& ./newrelic-install install \
	&& pear install --alldeps mail

EXPOSE 80
