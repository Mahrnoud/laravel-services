<?php
declare(strict_types=1);

namespace App\Http\Controllers\Categories;

use App\Http\Controllers\Controller;
use App\Http\Requests\Categories\CategoryUpdateRequest;
use App\Services\Categories\CategoryUpdateService;

class UpdateController extends Controller
{
    private CategoryUpdateService $categoryUpdateService;

    public function __construct()
    {
        $this->categoryUpdateService = new CategoryUpdateService();
    }

    public function __invoke(CategoryUpdateRequest $categoryUpdateRequest, int $id) :object
    {
        $updatedCategory = $this->categoryUpdateService->update($categoryUpdateRequest->validated(), $id);

        if($updatedCategory){

            return response(['message' => 'Updated successfully!'], 200);
        }

        return response(['message' => 'Error while update category!'], 301);
    }
}
