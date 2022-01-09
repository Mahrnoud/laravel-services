<?php
declare(strict_types=1);

namespace App\Http\Requests\Categories;

use Illuminate\Foundation\Http\FormRequest;

class CategoryUpdateRequest extends FormRequest
{

    public function rules() :array
    {
        return [

            'category' => 'required',
            'description' => 'required'
        ];
    }
}
