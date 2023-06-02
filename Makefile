setup:
	composer install
	npm install
	npm install --global yarn
	yarn build

composer:
	composer install

assets:
	yarn build

start:
	symfony server:start

#Todo
docker-setup:
	docker compose build --pull --no-cache
	docker-compose run symfony_php composer install
	docker-compose run symfony_php yarn encore dev
	docker-compose up -d

#Todo
docker-composer:
	docker-compose run symfony_php composer install

#Todo
docker-assets:
	docker-compose run symfony_php yarn encore dev

#Todo
docker-assets-prod:
	docker-compose run symfony_php yarn encore prod

#Todo
docker-up:
	docker-compose up -d

#Todo
docker-down:
	docker-compose down

#Todo
docker-tests:
	docker-compose run symfony_php bin/phpunit