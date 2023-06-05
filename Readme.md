# Att dev

Product Search Application

## Getting Started

Install dependencies

1. composer install (https://getcomposer.org/doc/00-intro.md composer install instructions)
2. npm install
3. npm install --global yarn
4. yarn build
5. Install symfony cli https://symfony.com/download_

Start application

1. symfony server:start
2. Run `http://127.0.0.1:8000/` in browser


Docker setup - (Works on 8080 port) 

1. If not already done, [install Docker Compose](https://docs.docker.com/compose/install/) (v2.10+)
2. Run `docker-compose build` to build images
3. Run `docker-compose run attdev_php composer install` for docker composer install
4. Run `docker-compose run attdev_php yarn build` for docker yarn build
5. Run `docker-compose up` (the logs will be displayed in the current shell)
6. Open `http://localhost:8080` in your favorite web browser
7. Run `docker-compose down` to stop the Docker containers.

## Application Summary

1. HomePage/Displays Product Search Box  http://127.0.0.1:8000/
2. Search Results Page displays results http://127.0.0.1:8000/search-results?search=london
3. Uses https://global.atdtravel.com/api/products?geo=en&title=london

Unit testing

1. Run command php bin/phpunit. This will run 4 tests for ProductSearchServiceTest, ApiServiceTest and ProductSearchControllerTest


## Application details

1. Created 2 routes product_search (/) and product_search_results (/search-results). 
2. Controller ProductSearchController with 2 actions productSearchAction and productResultsAction
3. Created 2 services ProductSearchService and ApiService. ProductSearchService handles business logic for getting results from https://global.atdtravel.com/api/products?geo=en&title=london and filter parameters. ApiService is generic service to get ApiResponse
4. Created unit tests for ProductSearchService and ApiService. Could also use mock objects instead of making actual API calls.
5. Twig templates in product_search directory. created components directory for code likely to be reused example pagination and listing
6. Followed Symfony Code conventions
