FROM debian:buster

# Copy files in scrs into container
COPY /srcs/. /tmp/

# Installing packages
RUN apt-get update && \
		apt-get -y upgrade && \
		apt-get -y install nginx && \
		apt-get -y install mariadb-server mariadb-client && \
		apt-get -y install php7.3-fpm php-mysql php-curl php-gd php-intl php-mbstring php-soap php-xml php-xmlrpc php-zip && \
		apt-get -y install wget && \
		apt-get -y install unzip && \
		apt-get -y install libnss3-tools && \
		apt-get -y install sendmail

# NGINX setup
RUN mv /tmp/nginx.config /etc/nginx/sites-available/default

# MYSQL and Wordpress setup
RUN service mysql start && \
	mysql -e "CREATE USER 'admin'@'localhost' IDENTIFIED BY 'fluffy';" && \
	mysql -e "CREATE DATABASE wordpress;" && \
	mysql -e "CREATE DATABASE phpmyadmin;" && \
	mysql -e "GRANT ALL PRIVILEGES ON *.* TO 'admin'@'localhost';" && \
	mysql -e "FLUSH PRIVILEGES;"

# SSL
RUN wget -O mkcert https://github.com/FiloSottile/mkcert/releases/download/v1.4.1/mkcert-v1.4.1-linux-arm && \
	chmod 777 mkcert && \
	mv mkcert /usr/local/bin && \
	mkcert -install && \
	mkcert localhost && \
	mv localhost-key.pem /root/ && \
	mv localhost.pem /root/

# phpMyAdmin
RUN wget https://files.phpmyadmin.net/phpMyAdmin/4.9.0.1/phpMyAdmin-4.9.0.1-all-languages.zip && \
	unzip phpMyAdmin-4.9.0.1-all-languages.zip && \
	mv phpMyAdmin-4.9.0.1-all-languages /var/www/html/phpmyadmin && \
	mv /tmp/config.inc.php /var/www/html/phpmyadmin/

# Install wordpress
RUN wget https://wordpress.org/latest.tar.gz -P /tmp && \
	tar xzf /tmp/latest.tar.gz --strip-components=1 -C /var/www/html/ && \
	cp /tmp/wp-config.php /var/www/html/ && \
	wget -O wp https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar && \
	chmod +x wp && \
	mv wp /usr/local/bin/ && \
	service mysql start && \
	wp core install --allow-root --url=localhost --path=/var/www/html/ --title="Fluffy Wordpress" --admin_name=admin --admin_password=fluffy --admin_email=fluffy@fluffclucb.com && \
	chown -R www-data:www-data /var/www

# Increase maximum uploadsize
RUN rm -rf /etc/php/7.3/fpm/php.ini && \
	mv /tmp/php.ini /etc/php/7.3/fpm/php.ini

# Expose the ports
EXPOSE 80
EXPOSE 443
EXPOSE 465

# Run the commands
CMD service nginx start && \
	service php7.3-fpm start && \
	service mysql start && \
	service sendmail start && \
	tail -f /dev/null

