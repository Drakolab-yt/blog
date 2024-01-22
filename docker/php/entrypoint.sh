#!/bin/sh
set -e

chmod -R 777 var/

exec docker-php-entrypoint "$@"
