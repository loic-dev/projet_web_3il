FROM httpd:alpine3.16

COPY ./conf/httpd.conf /usr/local/apache2/conf/httpd.conf

RUN addgroup -g 1000 app \
&& adduser -D -H -h /var/www -s /sbin/nologin -G app -u 1000 app

RUN mkdir -p /var/www/html \
&& chown -R app:app /var/www /usr/local/apache2/logs

USER app:app

WORKDIR /var/www/html

EXPOSE 8000

CMD /usr/local/apache2/bin/httpd -D FOREGROUND