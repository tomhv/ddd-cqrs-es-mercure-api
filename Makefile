hello:
	echo Hello

up:
	docker-compose up -d

down:
	docker-compose down

ps:
	docker-compose ps

composer.install:
	docker-compose exec app composer install

start: up ps

restart: down up ps
