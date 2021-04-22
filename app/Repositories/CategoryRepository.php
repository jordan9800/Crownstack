<?php

namespace App\Repositories;

use App\Models\Category;
use App\Repositories\BaseRepository;

class CategoryRepository extends BaseRepository
{
    /**
     * CategoryRepository Constructor.
     * 
     * @param Category $product
     */
    public function __construct(Category $category)
    {
        parent::__construct($category);
    }
}