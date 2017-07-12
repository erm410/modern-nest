#!/bin/bash -x

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

find /var/www/html/* -maxdepth 0 -not -name 'wp-config.php' -not -name 'wp-content' -print0 | xargs -0 rm -rf --
rm -rf /var/www/html/wp-content/themes/{loffle,fora}

cp -r wp/* /var/www/html
cp -r fora loffle /var/www/html/wp-content/themes

cd /var/www/html/wp-content/themes/loffle
lessc less/style.less style.css

chown -R www-data:www-data /var/www/html/wp-content
