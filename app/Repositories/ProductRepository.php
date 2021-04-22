<?php

namespace App\Repositories;

use App\Models\Product;
use App\Repositories\BaseRepository;

class ProductRepository extends BaseRepository
{
    /**
     * ProductRepository Constructor.
     * 
     * @param Product $product
     */
    public function __construct(Product $product)
    {
        parent::__construct($product);
    }
}