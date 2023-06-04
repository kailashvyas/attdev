<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Service\ProductSearchService;


/**
 * ProductSearchController
 */
class ProductSearchController extends AbstractController
{
    /**
     * Search Page
     *
     * @return Response
     */
    public function search(): Response
    {
        return $this->render('product_search/search.html.twig');
    }

    /**
     * Search Results Page
     *
     * @param Request              $request
     * @param ProductSearchService $productSearchService
     *
     * @return Response
     */
    public function searchResults(Request $request, ProductSearchService $productSearchService): Response
    {
        $productListing = $productSearchService->getSearchResults($request);
        return $this->render('product_search/results.html.twig', [
            'productListing' => $productListing
        ]); 
    }
}