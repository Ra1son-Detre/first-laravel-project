<?php

namespace App\Http\Requests\Brands;

use App\Models\Brand;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Http\Requests\Brands\Store;

class Update extends Store
{
    
   

    protected function titleUniqueRule()
    {
        return parent::titleUniqueRule()->ignore($this->brand->id);
    }
}
