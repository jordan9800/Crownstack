<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Transformers\ProductTransformer;
use App\Repositories\ProductRepository;

class ProductController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Product Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles all the functions related to product and its operations.
    |
    */

    private $transformer;
    private $productRepository;

    /**
     * ProductController constructor
     * 
     * @param ProductTransformer $transformer
     * @param ProductRepository $productRepository
     */
    public function __construct(ProductTransformer $transformer,
                                ProductRepository $productRepository)
    {
        $this->transformer = $transformer;
        $this->productRepository = $productRepository;
    } 

    /**
     * Fetch all the products 
     * with pagination of 5 products 
     * at once.
     */
    public function index()
    {
       $products = $this->productRepository->get(5);

       return $this->transformer->transformPaginationList($products);
    }

    /**
     * Fetch detailed information of
     * a product.
     * @param $id
     */
    public function show($id)
    {
        $product = $this->productRepository->find($id);

        return $this->transformer->transform($product, [], true);
    }
    
}
