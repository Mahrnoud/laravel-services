<?php

namespace App\Services\Products;

use App\Http\Resources\Products\ProductResource;
use App\Models\Product;

class ProductTrashService
{

    private Product $product;

    public function __construct()
    {
        $this->product = new Product();
    }

    public function getTrashed() :object
    {
        return ProductResource::collection($this->product->getTrashed());
    }
}
