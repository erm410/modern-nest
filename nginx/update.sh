#!/bin/bash

if [ -d /opt/wp ]; then

	cd /opt/wp
	git fetch
	git reset --hard origin/master

else

	cd /opt
	git clone https://github.com/erm410/modern-nest.git wp
	cd wp

fi

cp newrelic.ini opcache.ini /usr/local/etc/php/conf.d
cp nginx/conf /etc/nginx/sites-enabled/default
cp -r wp/* /var/www/html
cp -r fora loffle /var/www/html/wp-content/themes
cd /var/www/html/wp-content/themes/loffle
lessc less/style.less style.css
