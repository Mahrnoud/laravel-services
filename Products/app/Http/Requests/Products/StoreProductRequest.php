<?php
declare(strict_types=1);

namespace App\Http\Requests\Products;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{

    public function rules() :array
    {
        return [

            'product' => 'required',
            'description' => 'required',
            'image' => 'nullable|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ];
    }
}
