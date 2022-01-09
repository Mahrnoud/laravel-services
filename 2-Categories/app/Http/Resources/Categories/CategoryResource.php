<?php
declare(strict_types=1);

namespace App\Http\Resources\Categories;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{

    public function toArray($request) :array
    {
        return [

            'id' => $this->id,
            'attributes' => [

                'product' => $this->category,
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
