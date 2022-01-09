<?php
declare(strict_types=1);

namespace App\Http\Controllers\Categories;

use App\Http\Controllers\Controller;
use App\Services\Categories\CategoryIndexService;

class IndexController extends Controller
{

    private CategoryIndexService $categoryIndexService;

    public function __construct()
    {
        $this->categoryIndexService = new CategoryIndexService();
    }

    public function __invoke() :object
    {
        return $this->categoryIndexService->loadCategories();
    }


}
