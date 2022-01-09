<?php
declare(strict_types=1);

namespace App\Http\Controllers\Categories;

use App\Http\Controllers\Controller;
use App\Services\Categories\CategoryDeleteService;

class DeleteController extends Controller
{

    private CategoryDeleteService $categoryDeleteService;

    public function __construct()
    {
        $this->categoryDeleteService = new CategoryDeleteService();
    }

    public function __invoke(int $id) :object
    {
        $deletedCategory = $this->categoryDeleteService->delete($id);

        if($deletedCategory){

            return response(['message' => 'Deleted successfully!'], 200);
        }

        return response(['message' => 'Error while delete category!'], 204);
    }
}
