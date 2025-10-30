<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Http\Controllers\Controller;
use App\Http\Requests\Brands\Store as StoreRequest; // as это псевдоним, эти типо Магазин as Магаз что-бы не было путаницы в именах одинаковых
use App\Http\Requests\Brands\Update as UpdateRequest;

class Brands extends Controller
{

    public function index()
    {   
        $brands = Brand::orderBy('title')->get();
        return view('brands.index', compact('brands'));
    }

   
    public function create()
    {
        return view('brands.create');
    }

   
    public function store(StoreRequest $request)
    {
        $brand = Brand::create($request->validated());
        
        return redirect()->route('brands.index');
    }

    
    public function show(Brand $brand)
    {
        return view('brands.show', compact('brand'));
    }

    
    public function edit(Brand $brand)
    {
        return view('brands.edit', compact('brand'));
        
    }

   
    public function update(UpdateRequest $request, Brand $brand)
    {
        $brand->update($request->validated());
       /*  dd($request->all(), $request->validated()); */
        return redirect()->route('brands.index');
    }

    
    public function destroy(Brand $brand)
    {
        $brand->delete();

        return redirect()->route('brands.index');
    }
}
