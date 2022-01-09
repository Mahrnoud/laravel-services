<?php
declare(strict_types=1);

namespace App\Http\Controllers\Categories;

use App\Http\Controllers\Controller;
use App\Services\Categories\CategoryForceDeleteService;

class ForceDeleteController extends Controller
{

    private CategoryForceDeleteService $categoryForceDeleteService;

    public function __construct()
    {
        $this->categoryForceDeleteService = new CategoryForceDeleteService();
    }

    public function __invoke(int $id) :object
    {
        $delete = $this->categoryForceDeleteService->forceDelete($id);

        if($delete){

            return response(['message' => 'Deleted successfully!'], 200);
        }
        return response(['message' => 'Error while delete category!'], 204);
    }
}
