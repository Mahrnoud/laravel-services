<?php
declare(strict_types=1);

namespace App\Http\Resources\Products;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{

    public function toArray($request) :array
    {
        return [

            'id' => $this->id,
            'attributes' => [

                'product' => $this->product,
                'description' => $this->description
            ],
            'relationships' => [],
            'links' => [

                'productLink' => route('products:show', $this->id),
                'productUpdate' => route('products:update', $this->id),
                'productDelete' => route('products:delete', $this->id)
            ]
        ];
    }
}
