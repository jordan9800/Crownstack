<?php

namespace App\Transformers;


use App\Transformers\BaseTransformer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class CartTransformer extends BaseTransformer
{
    public function transform(Model $cart, $relations = [], $includeExtras = false)
    {
        return [
            'id'            => $cart->id,
            'name'          => $cart->name,
            'image'         => $cart->image,
            'description'   => $cart->description,
            'price'         => $cart->price,
            'quantity'      => $cart->pivot->quantity,
            'total'         => $cart->price * $cart->pivot->quantity,
        ];
        
    }

}
