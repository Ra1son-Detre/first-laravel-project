<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Car;

class Cars extends Controller
{
    public function index()
    {
        $cars = Car::all();
        return view('cars.index',['cars'=>$cars]);
        /* dd($cars); */
    }

    
    public function create()
    {
        return view('cars.create');
    }

    
    public function store(Request $request)
    {
        $validated = $request->validate([
             'brand' => 'required|min:2|max:100',
             'model' => 'required|min:2|max:100',
             'price' => 'required|min:2|max:100',
        ]);
        
        $car = Car::create($validated);
        $cars = Car::all();
        return view('cars.index', ['cars'=>$cars]);
    }

   
    public function show($id)
    {
        $cars = Car::findOrFail($id);
        return view('cars.show', ['cars'=>$cars]);
    }

   
    public function edit($id)
    {
        //
    }

  
    public function update(Request $request, $id)
    {
        //
    }

 
    public function destroy($id)
    {
        //
    }
}
