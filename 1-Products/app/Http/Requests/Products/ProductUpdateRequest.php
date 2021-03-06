<?php
declare(strict_types=1);

namespace App\Http\Requests\Products;

use Illuminate\Foundation\Http\FormRequest;

class ProductUpdateRequest extends FormRequest
{

    public function rules() :array
    {
        return [

            'product' => 'required',
            'description' => 'required'
        ];
    }
}
