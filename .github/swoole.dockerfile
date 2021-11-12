ARG SWOOLE_DOCKER_VERSION

FROM phpswoole/swoole:${SWOOLE_DOCKER_VERSION}

RUN set -eux \
    && apt-get update && apt-get -y install procps libpq-dev unzip git \
    && docker-php-ext-install -j$(nproc) pdo_mysql \
    && echo "zend_extension=opcache.so" >> /usr/local/etc/php/conf.d/docker-php-ext-opcache.ini
