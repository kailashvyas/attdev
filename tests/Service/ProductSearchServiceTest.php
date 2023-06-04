<?php

namespace App\Tests\Service;

use Symfony\Component\HttpFoundation\Request;
use App\Service\ApiService;
use App\Service\ProductSearchService;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

/**
 * ProductSearchService Test
 */
class ProductSearchServiceTest extends KernelTestCase 
{

    /**
     * Test GetSearchResults method
     */
	public function testGetSearchResults()
	{
                $urlDefinitions = ['search_definition' => 'https://global.atdtravel.com/api/products' ];
                $apiService = new ApiService($urlDefinitions);
                $productSearchService = new ProductSearchService($apiService);
                $request = Request::create('http://127.0.0.1:83/?search=london');
                $response = $productSearchService->getSearchResults($request);
                $this->assertTrue($response->meta->count > 0);
	}
}