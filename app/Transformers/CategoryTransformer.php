<?php

namespace App\Transformers;


use App\Transformers\BaseTransformer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use App\Transformers\ProductTransformer;

class CategoryTransformer extends BaseTransformer
{
    public function transform(Model $category, $relations = ['products'], $includeExtras = false)
    {
        $data = [
			'id'    => $category->id,
			'name' 	=> $category->name,
			'type'  => ucfirst($category->type),
		];

		foreach($relations as $relation) {

			if(method_exists($this, $relation)) {
				$data[$relation] = $this->{$relation}($category, $includeExtras);
			}
		}

		return $data;
    }

	/**
	 * @param $category
	 * @param $includeExtras
	 * @return collection
	 */
	public function products($category, $includeExtras)
	{
		$transformer = new ProductTransformer();

		$products = $category->products()->paginate(2);

		return $transformer->transformPaginationList($products, [], $includeExtras=false);
	}

}
