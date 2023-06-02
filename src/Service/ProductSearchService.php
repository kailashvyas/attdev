<?php

namespace App\Service;

use Symfony\Component\HttpFoundation\Request;
use App\Service\ApiService;

/**
 * ProductSearchService - search service to get results from search.
 */
class ProductSearchService
{
    const LIMIT = 10;

    const MAX_LIMIT = 20;

    const LOCALES = ['en'=>'en', 'en-ie'=>'en-ie', 'de-de'=>'de-de'];

    /**
     * Api Service
     *
     * @var ApiService
     */
    private $apiService;

    /**
     * Constructor.
     *
     * @param ApiService $apiService ApiService
     */
    public function __construct(ApiService $apiService)
    {
        $this->apiService = $apiService;
    }

    /**
     * CreateFilterParams - build filter params for search request.
     *
     * @param Request $request Request Object
     *
     * @return array
     */
    public function createFilterParams(Request $request)
    {
        $page = $request->query->get('page', 1);
        $locale = strtolower($request->getLocale());
        if (isset(self::LOCALES[$locale])) {
            $geo = self::LOCALES[$locale];
        } else {
            $geo = 'en';
        }
        $params['geo'] = 'en';
        $params['title'] = $request->query->get('search', '');
        $resultsPerPage = $request->query->get('resultsPerPage', self::LIMIT);
        $params['limit'] = ($resultsPerPage > self::MAX_LIMIT) ? self::LIMIT : $resultsPerPage;
        $params['offset'] = (1 == $page) ? 0 : (($page - 1) *  $params['limit'] + 1);
        
        return $params;
    }

    /**
     * GetSearchResults - get search Results using apiService.
     *
     * @param Request $request Request Object
     *
     * @return array
     */
    public function getSearchResults(Request $request)
    {
        if (!empty(trim($request->query->get('search')))) {
            $params = $this->createFilterParams($request);
            $listing = $this->apiService->getApiResponse('search_definition', $params);
        }

        return $listing;
    }
}