#!/usr/bin/env bash

set -e

check_dir () {
	if [ -z "$1" ]; then
		return 0
	fi

	if [ ! -d "$1" ]; then
		mkdir $1
	fi
}

check_file () {
	if [ -z "$1" ]; then
		return 0
	fi

	if [ ! -f "$1" ]; then
		touch $1
	fi
}

check_dir /var/log/apt
check_dir /var/log/fsck
check_dir /var/log/nginx
check_dir /var/log/unattended-upgrades
check_dir /var/log/upstart

check_file /var/log/auth.log
check_file /var/log/cron.log
check_file /var/log/error
check_file /var/log/messages
check_file /var/log/php5-fpm.log
check_file /var/log/syslog
check_file /var/log/nginx/access.log
check_file /var/log/nginx/error.log



chown root:root /var/log/apt
chown root:root /var/log/fsck
chown root:root /var/log/nginx
chown root:root /var/log/unattended-upgrades
chown root:root /var/log/upstart
chown root:adm /var/log/auth.log
chown root:adm /var/log/cron.log
chown root:adm /var/log/error
chown root:adm /var/log/messages
chown root:adm /var/log/nginx/access.log
chown root:adm /var/log/nginx/error.log
chown root:adm /var/log/php5-fpm.log
chown root:adm /var/log/syslog


chmod 755 /var/log/apt
chmod 755 /var/log/fsck
chmod 750 /var/log/nginx
chmod 750 /var/log/unattended-upgrades
chmod 750 /var/log/upstart
chmod 640 /var/log/auth.log
chmod 640 /var/log/cron.log
chmod 640 /var/log/error
chmod 640 /var/log/messages
chmod 640 /var/log/nginx/access.log
chmod 640 /var/log/nginx/error.log
chmod 640 /var/log/php5-fpm.log
chmod 640 /var/log/syslog
