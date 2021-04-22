<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'type', 'year'];

    /**
     * Defining relationship that a category
     * has many products.
     **/
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
