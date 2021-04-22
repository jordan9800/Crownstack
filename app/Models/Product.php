<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 
                           'description',
                           'price',
                           'category_id',
                           'make', 
                           'image',
                           'extra_images',
                           'quantity',
                           'featured' ];
                           
    /**
     * Defining relationship that a product
     * belongs to a particular category.
     **/
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Helper method for categorizing 
     * quantity of product
     **/
    public function stock()
    {
        if($this->quantity <= 5)
        {
            return "Low Stock";
        }

        return "In Stock";

    }
}
