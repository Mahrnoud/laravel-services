<?php
declare(strict_types=1);

namespace App\Services\Categories;

use App\Models\Category;

class CategoryCreateService
{

    private Category $category;

    public function __construct()
    {
        $this->category = new Category();
    }

    public function store(object $request) :int
    {

        /**
         * Category Image
         *
         *  check if request has image
         *      create image thumbnail ( optional )
         *          - here if you want to generate image-thumbnail you can use (intervention/image) package
         *      upload image and image thumbnails
         *      return array('image' => 'bird.png', 'thumbnail' => 'bird-thumbnail.png')
         *
         */
        if ($request->picture){

            $uploadedImages = imageUpload(public_path('images/category'), $request->picture);

            // request offset ( image and image-thumbnail ) new value
            $request->offsetSet('image', $uploadedImages['image']);
            $request->offsetSet('image_thumbnail', $uploadedImages['imageThumbnail']);
        }

        return $this->category->storeCategory($request->only(['category', 'description', 'image', 'image_thumbnail']));
    }
}
