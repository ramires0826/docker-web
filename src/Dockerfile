ARG server_name="MyApp"

FROM nginx:alpine

RUN rm -rf /var/cache/apk/*         \
    && apk update                   \
    && apk add bash curl mc php     \
    php-fpm fcgi php-mysqli         \
    mysql-client mariadb-connector-c-dev

RUN mkdir /app                      \
    && adduser -D -g 'www' www      \
    && chown -R www:www /app        \
    && chown -R www:www /etc/nginx

COPY ./nginx /app
WORKDIR /app

ENTRYPOINT ["/bin/bash", "-c", "php-fpm8 && nginx -c /app/conf/nginx.conf"]

EXPOSE 8080