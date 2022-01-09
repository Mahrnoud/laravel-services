<?php
declare(strict_types=1);

namespace App\Services\Categories;


use App\Http\Resources\Categories\CategoryResource;
use App\Models\Category;

class CategoryIndexService
{

    private Category $category;

    public function __construct()
    {
        $this->category = new Category();
    }

    public function loadCategories() :object
    {
        return CategoryResource::collection($this->category->getCategories());
    }

}
