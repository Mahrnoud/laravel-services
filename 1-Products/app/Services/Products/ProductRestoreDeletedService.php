<?php
declare(strict_types=1);

namespace App\Services\Products;

use App\Models\Product;
use Exception as ExceptionAlias;

class ProductRestoreDeletedService
{
    private Product $product;

    public function __construct()
    {
        $this->product = new Product();
    }

    public function restore(int $id) :bool
    {
        try {

            return $this->product->findTrashed($id)->restore();

        }catch (ExceptionAlias $exception)
        {
            return false;
        }

    }
}
