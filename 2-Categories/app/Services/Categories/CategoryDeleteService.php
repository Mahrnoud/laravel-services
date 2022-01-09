<?php
declare(strict_types=1);

namespace App\Services\Categories;

use App\Models\Category;

class CategoryDeleteService
{
    private Category $category;

    public function __construct()
    {
        $this->category = new Category();
    }

    public function delete(int $id) :int
    {
        return $this->category->deleteCategory($id);
    }
}
