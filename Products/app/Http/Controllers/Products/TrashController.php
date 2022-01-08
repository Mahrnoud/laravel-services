<?php
declare(strict_types=1);

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use App\Services\Products\ProductTrashService;

class TrashController extends Controller
{

    private ProductTrashService $productTrashService;

    public function __construct()
    {
        $this->productTrashService = new ProductTrashService();
    }

    public function __invoke() :object
    {
        return $this->productTrashService->getTrashed();
    }
}
