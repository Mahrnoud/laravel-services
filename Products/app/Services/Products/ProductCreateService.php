<?php
declare(strict_types=1);

namespace App\Services\Products;

use App\Models\Product;

class ProductCreateService
{

    private Product $product;

    public function __construct()
    {
        $this->product = new Product();
    }

    public function store(object $request) :int
    {

        /**
         * Product Image
         *
         *  check if request has image
         *      create image thumbnail ( optional )
         *          - here if you want to generate image-thumbnail you can use (intervention/image) package
         *      upload image and image thumbnails
         *      return array('image' => 'bird.png', 'thumbnail' => 'bird-thumbnail.png')
         *
         */
        if ($request->picture){

            $uploadedImages = imageUpload(public_path('images/product'), $request->picture);

            // request offset ( image and image-thumbnail ) new value
            $request->offsetSet('image', $uploadedImages['image']);
            $request->offsetSet('image_thumbnail', $uploadedImages['imageThumbnail']);
        }

        return $this->product->storeProduct($request->only(['product', 'description', 'image', 'image_thumbnail']));
    }
}
