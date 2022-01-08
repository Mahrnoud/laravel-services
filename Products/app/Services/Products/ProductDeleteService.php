<?php
declare(strict_types=1);

namespace App\Services\Products;

use App\Models\Product;

class ProductDeleteService
{
    private Product $product;

    public function __construct()
    {
        $this->product = new Product();
    }

    public function delete(int $id) :int
    {
        return $this->product->deleteProduct($id);
    }
}
