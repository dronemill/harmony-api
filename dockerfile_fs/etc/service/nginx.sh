#!/bin/sh
exec /sbin/setuser root /usr/sbin/nginx -g "daemon off;" 1>>/var/log/nginx/error.log 2>&1
