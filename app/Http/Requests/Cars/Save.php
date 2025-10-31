<?php

namespace App\Http\Requests\Cars;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class Save extends FormRequest
{

    public function authorize()
    {
        return true;
    }

   
    public function rules()
    {
        return [
            'brand_id' => ['required', 'exists:brands,id'],
            'model' => 'required|min:2|max:100',
            'price' => 'required|integer|min:0|max:10000000000',
            'transmission' => 'required',
            'vin' => [
                'required',
                'string',
                'min:2',
                'max:16',
                Rule::unique('cars', 'vin')->ignore($this->route('car')?->id),
            ],
            'tags'=> 'array',
            'tags.*'=>'integer|exists:tags,id' //эта запись гооврит что переданное значение в массиве число и оно должно быть в таблице tags в поле id
            ];
    }

    public function attributes() 
    {
        return [
            'brand_id' => 'Brand',
            'model' => 'Model',
            'price' => 'Price',
            'transmission' => 'Transmission',
            'vin' => 'Vin',
            'tags' => 'Теги'
        ];

    }
}
