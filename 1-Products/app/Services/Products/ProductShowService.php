<?php
declare(strict_types=1);

namespace App\Services\Products;

use App\Http\Resources\Products\ProductResource;
use App\Models\Product;

class ProductShowService
{
    private Product $product;

    public function __construct()
    {
        $this->product = new Product();
    }

    public function loadProduct(int $id) :object
    {
        return new ProductResource($this->product->findProduct($id));
    }
}
