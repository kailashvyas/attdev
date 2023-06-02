<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Service\ProductSearchService;

class ProductSearchController extends AbstractController
{
    public function search(Request $request, ProductSearchService $productSearchService): Response
    {
        return $this->render('product_search/search.html.twig');
    }

    public function searchResults(Request $request, ProductSearchService $productSearchService): Response
    {
        $productListing = $productSearchService->getSearchResults($request);
        return $this->render('product_search/results.html.twig', [
            'productListing' => $productListing
        ]); 
    }
}