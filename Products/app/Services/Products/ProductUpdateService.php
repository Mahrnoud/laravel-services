<?php
declare(strict_types=1);

namespace App\Services\Products;

use App\Models\Product;

class ProductUpdateService
{
    private Product $product;

    public function __construct()
    {
        $this->product = new Product();
    }

    public function update(array $request, int $id) : int
    {
        return $this->product->updateProduct($request, $id);
    }

}
