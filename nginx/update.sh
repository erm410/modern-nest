#!/bin/bash

if [ -z "$1" ]; then
	branch=master
else
	branch="$1"
fi

if [ -d /opt/wp ]; then

	cd /opt/wp
	git fetch
	git reset --hard origin/$branch

else

	cd /opt
	git clone https://github.com/erm410/modern-nest.git wp
	cd wp
	git checkout $branch

fi

cp newrelic.ini opcache.ini /usr/local/etc/php/conf.d
cp nginx/conf /etc/nginx/conf.d/default.conf
cp nginx/common /etc/nginx/common.conf

mkdir -p /var/www/html/wp-content/{themes,plugins,cache/nginx,temp/fcgi}

mv /var/www/html/wp-content /tmp

rm -rf /var/www/html/*

cp -r wp/* /var/www/html

mv /tmp/wp-content /var/www/html

rm -rf /var/www/html/wp-content/themes/{loffle,fora}
cp -r fora loffle /var/www/html/wp-content/themes

cd /var/www/html/wp-content/themes/loffle
lessc less/style.less style.css
