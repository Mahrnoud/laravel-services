<?php
declare(strict_types=1);

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use App\Services\Products\ProductShowService;

class ShowController extends Controller
{

    private ProductShowService $productShowService;

    public function __construct()
    {
        $this->productShowService = new ProductShowService();
    }

    public function __invoke(int $id) :object
    {
        return $this->productShowService->loadProduct($id);
    }
}
