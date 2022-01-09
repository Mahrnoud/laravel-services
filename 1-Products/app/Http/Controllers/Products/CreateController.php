<?php
declare(strict_types=1);

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use App\Http\Requests\Products\ProductStoreRequest;
use App\Services\Products\ProductCreateService;


class CreateController extends Controller
{

    private ProductCreateService $productCreateService;

    public function __construct()
    {
        $this->productCreateService = new ProductCreateService();
    }

    public function __invoke(ProductStoreRequest $productStoreRequest) :object
    {

        $storedProduct = $this->productCreateService->store($productStoreRequest);

        if($storedProduct){

            return response(['message' => 'Created successfully!', 'id' => $storedProduct], 201);
        }

        return response(['message' => 'Error while create product!'], 301);
    }
}
