<?php
declare(strict_types=1);

namespace App\Http\Controllers\Categories;

use App\Http\Controllers\Controller;
use App\Services\Categories\CategoryShowService;

class ShowController extends Controller
{

    private CategoryShowService $categoryShowService;

    public function __construct()
    {
        $this->categoryShowService = new CategoryShowService();
    }

    public function __invoke(int $id) :object
    {
        return $this->categoryShowService->loadCategory($id);
    }
}
