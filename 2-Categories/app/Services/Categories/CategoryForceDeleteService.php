<?php
declare(strict_types=1);

namespace App\Services\Categories;

use App\Models\Category;
use Exception as ExceptionAlias;

class CategoryForceDeleteService
{
    private Category $category;

    public function __construct()
    {
        $this->category = new Category();
    }

    public function forceDelete(int $id) :bool
    {
        try {

            // get category
            $category = $this->category->findTrashed($id);

            // unlink image and image thumbnails
            if($category->image){

                $imagePath = public_path('images/category');
                imageUnlink($imagePath, $category->image);
            }

            //delete category
            return $category->forceDelete();

        }catch (ExceptionAlias $exception){

            return false;
        }
    }

}
