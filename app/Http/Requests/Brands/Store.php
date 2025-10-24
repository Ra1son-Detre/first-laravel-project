<?php

namespace App\Http\Requests\Brands;

use App\Models\Brand;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class Store extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => ['required','min:2', 'max:64', $this->titleUniqueRule()],
        ];
    }

    public function attributes() 
    {
        return [
            'title' => 'Название',
        ];

    }

    protected function titleUniqueRule()
    {
        return Rule::unique(Brand::class, 'title');
    }
}
