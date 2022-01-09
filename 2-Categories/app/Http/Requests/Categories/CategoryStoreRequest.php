<?php
declare(strict_types=1);

namespace App\Http\Requests\Categories;

use Illuminate\Foundation\Http\FormRequest;

class CategoryStoreRequest extends FormRequest
{

    public function rules() :array
    {
        return [

            'category' => 'required',
            'description' => 'required',
            'picture' => 'nullable|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ];
    }
}
