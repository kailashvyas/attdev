# Att dev

Product Search Application

## Getting Started

Install dependencies

1. composer install
2. npm install
3. npm install --global yarn
4. yarn build

Start application

symfony server:start

Docker setup - (Work in Progress. Docker started correctly for me but might need some testing) 

1. If not already done, [install Docker Compose](https://docs.docker.com/compose/install/) (v2.10+)
2. Run `docker compose build --pull --no-cache` to build fresh images
3. Run `docker compose up` (the logs will be displayed in the current shell)
4. Open `https://localhost` in your favorite web browser and [accept the auto-generated TLS certificate](https://stackoverflow.com/a/15076602/1352334)
5. Run `docker compose down --remove-orphans` to stop the Docker containers.

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
