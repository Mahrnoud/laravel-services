<?php
declare(strict_types=1);

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use App\Http\Requests\Products\StoreProductRequest;
use App\Services\Products\ProductCreateService;


class CreateController extends Controller
{

    private ProductCreateService $productCreateService;

    public function __construct()
    {
        $this->productCreateService = new ProductCreateService();
    }

    public function __invoke(StoreProductRequest $storeProductRequest) :object
    {

        $storedProduct = $this->productCreateService->store($storeProductRequest);

        if($storedProduct){

            return response(['message' => 'Created successfully!'], 201);
        }

        return response(['message' => 'Error while create product!'], 301);
    }
}
