docker-up:
    docker run -d --name hillel-php-fpm -v /blog:/app --network=hillel-app hillel-php-fpm
    docker run -d --name hillel-nginx -v /blog:/app --network=hillel-app -p 8080:80 hillel-nginx

docker-build:
    docker build --file=./docker/php/Dockerfile --tag hillel-php-fpm .
    docker build --file=./docker/nginx/Dockerfile --tag hillel-nginx .


