<?php
declare(strict_types=1);

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use App\Services\Products\ProductForceDeleteService;

class ForceDeleteController extends Controller
{

    private ProductForceDeleteService $productForceDeleteService;

    public function __construct()
    {
        $this->productForceDeleteService = new ProductForceDeleteService();
    }

    public function __invoke(int $id) :object
    {
        $delete = $this->productForceDeleteService->forceDelete($id);

        if($delete){

            return response(['message' => 'Deleted successfully!'], 200);
        }
        return response(['message' => 'Error while delete product!'], 204);
    }
}
