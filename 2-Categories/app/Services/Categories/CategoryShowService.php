<?php
declare(strict_types=1);

namespace App\Services\Categories;

use App\Http\Resources\Categories\CategoryResource;
use App\Models\Category;

class CategoryShowService
{
    private Category $category;

    public function __construct()
    {
        $this->category = new Category();
    }

    public function loadCategory(int $id) :object
    {
        return new CategoryResource($this->category->findCategory($id));
    }
}
