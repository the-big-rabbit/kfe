install:
	docker-compose up -d \
	&& docker-compose exec apache symfony composer install --prefer-dist --optimize-autoloader \
	&& docker-compose exec apache composer clear-cache \
	&& docker-compose exec apache symfony console doctrine:migrations:migrate \
	&& docker-compose exec apache symfony console d:f:l
update:
	docker-compose exec apache symfony composer update --prefer-dist \
	&& docker-compose exec apache composer clear-cache
start:
	docker-compose up -d
down:
	docker-compose down