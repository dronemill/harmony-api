#!/bin/sh
exec /sbin/setuser root /usr/sbin/php5-fpm 1>>/var/log/php5-fpm.log 2>&1
