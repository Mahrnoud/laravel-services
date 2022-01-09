<?php
declare(strict_types=1);

namespace App\Http\Controllers\Categories;

use App\Http\Controllers\Controller;
use App\Http\Requests\Categories\CategoryStoreRequest;
use App\Services\Categories\CategoryCreateService;


class CreateController extends Controller
{

    private CategoryCreateService $categoryCreateService;

    public function __construct()
    {
        $this->categoryCreateService = new CategoryCreateService();
    }

    public function __invoke(CategoryStoreRequest $categoryStoreRequest) :object
    {

        $storedCategory = $this->categoryCreateService->store($categoryStoreRequest);

        if($storedCategory){

            return response(['message' => 'Created successfully!', 'id' => $storedCategory], 201);
        }

        return response(['message' => 'Error while create category!'], 301);
    }
}
