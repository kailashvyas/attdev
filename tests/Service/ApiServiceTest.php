<?php

namespace App\Tests\Service;

use Symfony\Component\HttpFoundation\Request;
use App\Service\ApiService;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

/**
 * ApiServiceTest Test ApiService
 */
class ApiServiceTest extends KernelTestCase 
{

    public $apiService;

    /**
     * TestGetApiResponse - Test getApiResponse method
     */
	public function testGetApiResponse()
	{
                $urlDefinitions = ['search_definition' => 'https://global.atdtravel.com/api/products' ];
                $this->apiService = new ApiService($urlDefinitions);
                $params = ['title'=>'london', 'offset'=>0, 'limit'=>10, 'geo'=> 'en'];
                $response = $this->apiService->getApiResponse('search_definition', $params);
                $this->assertTrue($response->meta->count > 0);
	}
}