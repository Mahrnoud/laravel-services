<?php
declare(strict_types=1);

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use App\Http\Requests\Products\ProductUpdateRequest;
use App\Services\Products\ProductUpdateService;

class UpdateController extends Controller
{
    private ProductUpdateService $productUpdateService;

    public function __construct()
    {
        $this->productUpdateService = new ProductUpdateService();
    }

    public function __invoke(ProductUpdateRequest $productUpdateRequest, int $id) :object
    {
        $updatedProduct = $this->productUpdateService->update($productUpdateRequest->validated(), $id);

        if($updatedProduct){

            return response(['message' => 'Updated successfully!'], 200);
        }

        return response(['message' => 'Error while update product!'], 301);
    }
}
