#
# Harmony API DockerFile
#

FROM phusion/baseimage:0.9.16



#
# Misc Config
#

# set the maintainer
MAINTAINER pmccarren

# Set correct environment variables.
ENV HOME /root

# Expose the propper port (we will only ever serve over tls)
EXPOSE 443

# Use baseimage-docker's init system.
CMD ["/sbin/my_init"]



#
# Misc Init
#
ADD dockerfile_fs/etc/my_init.d/check_log_structure.sh /etc/my_init.d/check_log_structure.sh



#
# Install packages
#

RUN apt-get update && \
	apt-get install -y python-software-properties software-properties-common && \
	nginx=stable && \
	add-apt-repository -y ppa:nginx/$nginx && \
	LANG=C.UTF-8 add-apt-repository -y ppa:ondrej/php5-5.6 && \
	apt-get update && \
	apt-get install -y \
		nginx \
		ssmtp \
		mailutils && \
		apt-get install -y php5-cli \
		php5-common \
		php5-dev \
		php5-gd \
		php5-mysql \
		php5-fpm \
		php5-mcrypt \
		php5-curl \
		php5-sqlite



#
# Nginx
#

RUN rm -f /etc/nginx/nginx.conf && \
	rm -rf /etc/nginx/conf.d && \
	rm -rf /usr/share/nginx/www

ADD dockerfile_fs/etc/nginx/nginx.conf /etc/nginx/nginx.conf
ADD dockerfile_fs/etc/nginx/conf.d /etc/nginx/conf.d
RUN rm /etc/logrotate.d/nginx
RUN mkdir /etc/service/nginx
ADD dockerfile_fs/etc/service/nginx.sh /etc/service/nginx/run
ADD dockerfile_fs/etc/logrotate.d/nginx /etc/logrotate.d/nginx



#
# PHP-FPM
#

RUN rm -f /etc/php5/fpm/php-fpm.conf && \
	rm -f /etc/php5/fpm/pool.d/www.conf && \
	rm -f /etc/php5/cli/php.ini && \
	rm -f /etc/php5/fpm/php.ini

ADD dockerfile_fs/etc/php5/fpm/php-fpm.conf /etc/php5/fpm/php-fpm.conf
ADD dockerfile_fs/etc/php5/fpm/pool.d/www.conf /etc/php5/fpm/pool.d/www.conf
ADD dockerfile_fs/etc/php5/cli/php.ini /etc/php5/cli/php.ini
ADD dockerfile_fs/etc/php5/fpm/php.ini /etc/php5/fpm/php.ini
ADD dockerfile_fs/etc/logrotate.d/php5-fpm /etc/logrotate.d/php5-fpm
RUN mkdir /etc/service/php5-fpm
ADD dockerfile_fs/etc/service/php5-fpm.sh /etc/service/php5-fpm/run



#
# Cleanup & optimize
#

RUN find /var/log -type f -delete && \
	apt-get clean && \
	rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*



#
# Add the api
#
ADD . /usr/share/nginx/api