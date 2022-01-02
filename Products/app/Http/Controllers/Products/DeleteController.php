<?php
declare(strict_types=1);

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use App\Services\Products\ProductDeleteService;

class DeleteController extends Controller
{

    private ProductDeleteService $productDeleteService;

    public function __construct()
    {
        $this->productDeleteService = new ProductDeleteService();
    }

    public function __invoke(int $id) :object
    {
        $deletedProduct = $this->productDeleteService->delete($id);

        if($deletedProduct){

            return response(['message' => 'Deleted successfully!'], 200);
        }

        return response(['message' => 'Error while delete product!'], 301);
    }
}
