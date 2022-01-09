<?php
declare(strict_types=1);

namespace App\Services\Categories;

use App\Models\Category;

class CategoryUpdateService
{
    private Category $category;

    public function __construct()
    {
        $this->category = new Category();
    }

    public function update(array $request, int $id) : int
    {
        return $this->category->updateCategory($request, $id);
    }

}
