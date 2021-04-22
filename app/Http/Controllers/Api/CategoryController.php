<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Transformers\CategoryTransformer;
use App\Repositories\CategoryRepository;

class CategoryController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Category Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles all the functions related to category and its 
    | operations eg. Display all categories, products based on a single category.
    |
    */

    private $transformer;
    private $categoryRepository;

    /**
     * CategoryController Constructor
     * 
     * @param CategoryTransformer $transformer
     * @param CategoryRepository  $categoryRepository
     */
    public function __construct(CategoryTransformer $transformer,
                                CategoryRepository  $categoryRepository)
    {
        $this->transformer        = $transformer;
        $this->categoryRepository = $categoryRepository;
    } 

    /**
     * Fetch collection of all categories.
     */
    public function index()
    {
       $categories = $this->categoryRepository->all();

       return $this->transformer->transformCollection($categories);
    }

    /**
     * Fetch all the category details 
     * and products of the category
     * 
     * @param $id
     */
    public function show($id)
    {
        $category = $this->categoryRepository->find($id);

        return $this->transformer->transform($category, ['products'], true);
    }
}
