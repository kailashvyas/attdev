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

docker-setup:
	docker compose build --pull --no-cache
	docker-compose run attdev_php composer install
	docker-compose run attdev_php yarn build
	docker-compose up -d

docker-composer:
	docker-compose run attdev_php composer install

docker-assets:
	docker-compose run attdev_php yarn encore dev

docker-assets-prod:
	docker-compose run attdev_php yarn encore prod

docker-up:
	docker-compose up -d

docker-down:
	docker-compose down

docker-tests:
	docker-compose run attdev_php bin/phpunit