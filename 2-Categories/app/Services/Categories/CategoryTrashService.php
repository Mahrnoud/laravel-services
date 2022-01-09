<?php

namespace App\Services\Categories;

use App\Http\Resources\Categories\CategoryResource;
use App\Models\Category;

class CategoryTrashService
{

    private Category $category;

    public function __construct()
    {
        $this->category = new Category();
    }

    public function getTrashed() :object
    {
        return CategoryResource::collection($this->category->getTrashed());
    }
}
