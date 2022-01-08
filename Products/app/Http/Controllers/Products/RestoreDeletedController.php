<?php
declare(strict_types=1);

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use App\Services\Products\ProductRestoreDeletedService;

class RestoreDeletedController extends Controller
{
    private ProductRestoreDeletedService $productRestoreDeletedService;

    public function __construct()
    {
        $this->productRestoreDeletedService = new ProductRestoreDeletedService();
    }

    public function __invoke(int $id) :object
    {
        $restore = $this->productRestoreDeletedService->restore($id);

        if($restore){

            return response(['message' => 'Product restore successfully!'], 200);
        }
        return response(['message' => 'Error while restore product!'], 204);
    }
}
