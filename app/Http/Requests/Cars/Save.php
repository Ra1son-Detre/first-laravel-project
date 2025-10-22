<?php

namespace App\Http\Requests\Cars;

use Illuminate\Foundation\Http\FormRequest;

class Save extends FormRequest
{

    public function authorize()
    {
        return true;
    }

   
    public function rules()
    {
        return [
            'brand' => 'required|min:2|max:100',
            'model' => 'required|min:2|max:100',
            'price' => 'required|integer|min:0|max:10000000000',
            'transmission' => 'required',
            'vin' => 'required|string|size:6|unique:cars,vin'
        ];
    }

    public function attributes() 
    {
        return [
            'brand' => 'Brand',
            'model' => 'Model',
            'price' => 'Price',
            'transmission' => 'Transmission',
            'vin' => 'Vin',
        ];

    }
}
