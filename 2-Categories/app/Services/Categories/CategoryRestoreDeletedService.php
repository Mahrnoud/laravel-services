<?php
declare(strict_types=1);

namespace App\Services\Categories;

use App\Models\Category;
use Exception as ExceptionAlias;

class CategoryRestoreDeletedService
{
    private Category $category;

    public function __construct()
    {
        $this->category = new Category();
    }

    public function restore(int $id) :bool
    {
        try {

            return $this->category->findTrashed($id)->restore();

        }catch (ExceptionAlias $exception)
        {
            return false;
        }

    }
}
