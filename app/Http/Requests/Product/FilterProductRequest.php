<?php

namespace App\Http\Requests\Product;

use App\Http\Requests\Request;

class FilterProductRequest extends Request
{
    public function rules(): array
    {
        return [
            'cities' => 'array',
            'cities.*' => 'exists:cities,id',
            'category' => 'exists:categories,id|nullable',
        ];
    }
}
