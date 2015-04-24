#!/usr/bin/env bash

# exit on errors
set -e

. /etc/profile.d/container_environment.sh

if [ -a /usr/share/nginx/api/.env ]; then
	mv /usr/share/nginx/api/.env /usr/share/nginx/api/.env.bkup;
fi;

cat /usr/share/nginx/api/.env.tmpl | perl -X -p -i -e 's/\$\{([^}]+)\}/defined $ENV{$1} ? $ENV{$1} : $&/eg' >> /usr/share/nginx/api/.env
