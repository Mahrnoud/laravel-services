<?php
declare(strict_types=1);

namespace App\Http\Controllers\Categories;

use App\Http\Controllers\Controller;
use App\Services\Categories\CategoryTrashService;

class TrashController extends Controller
{

    private CategoryTrashService $categoryTrashService;

    public function __construct()
    {
        $this->categoryTrashService = new CategoryTrashService();
    }

    public function __invoke() :object
    {
        return $this->categoryTrashService->getTrashed();
    }
}
