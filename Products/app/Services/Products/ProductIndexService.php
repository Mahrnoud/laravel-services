<?php
declare(strict_types=1);

namespace App\Services\Products;


use App\Http\Resources\Products\ProductResource;
use App\Models\Product;

class ProductIndexService
{

    private Product $product;

    public function __construct()
    {
        $this->product = new Product();
    }

    public function loadProducts() :object
    {
        return ProductResource::collection($this->product->getProducts());
    }

}
