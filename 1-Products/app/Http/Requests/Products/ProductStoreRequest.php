<?php
declare(strict_types=1);

namespace App\Http\Requests\Products;

use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest
{

    public function rules() :array
    {
        return [

            'product' => 'required',
            'description' => 'required',
            'picture' => 'nullable|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ];
    }
}
