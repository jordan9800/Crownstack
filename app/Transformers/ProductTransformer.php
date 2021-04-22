<?php

namespace App\Transformers;


use App\Transformers\BaseTransformer;
use Illuminate\Database\Eloquent\Model;

class ProductTransformer extends BaseTransformer
{
    public function transform(Model $product, $relations = [], $includeExtras = false)
    {
        $data = [
			'id'           => $product->id,
            'name'         => $product->name,
            'description'  => $product->description,
            'price'        => $product->price,
            'quantity'     => $product->stock(),
            'image'        => $product->image,
		];

        $extras = [
            'make'         => $product->make,
            'featured'     => $product->featured,
            'extra_images' => $product->extra_images,
		];

		if($includeExtras) {
			return  array_merge($data,$extras);
		}

		return $data;
        
    }
}
