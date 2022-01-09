<?php
declare(strict_types=1);

namespace App\Services\Products;

use App\Models\Product;
use Exception as ExceptionAlias;

class ProductForceDeleteService
{
    private Product $product;

    public function __construct()
    {
        $this->product = new Product();
    }

    public function forceDelete(int $id) :bool
    {
        try {

            // get product
            $product = $this->product->findTrashed($id);

            // unlink image and image thumbnails
            if($product->image){

                $imagePath = public_path('images/product');
                imageUnlink($imagePath, $product->image);
            }

            //delete product
            return $product->forceDelete();

        }catch (ExceptionAlias $exception){

            return false;
        }
    }

}
