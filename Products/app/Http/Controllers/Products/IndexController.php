<?php
declare(strict_types=1);

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use App\Services\Products\ProductIndexService;
use Illuminate\Http\Request;

class IndexController extends Controller
{

    private ProductIndexService $productIndexService;

    public function __construct()
    {
        $this->productIndexService = new ProductIndexService();
    }

    public function __invoke(Request $request) :object
    {
        return $this->productIndexService->loadProducts();
    }

}
