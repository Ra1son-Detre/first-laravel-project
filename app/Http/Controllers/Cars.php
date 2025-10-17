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
             'price' => 'required|integer|min:0|max:10000000000',
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
       $validated = $request->validate([
        'price' => 'required|numeric|min:1|max:1000000000'
       ]);
       $car =Car::findOrFail($id);
       $car->price = $validated['price'];
       $car->save();
       
       return redirect('/cars')->with('success', 'Цена обнавлена');
    }

 
    public function destroy($id)
    {
        $car = Car::findOrFail($id);
        $car->delete();
        return redirect()->route('cars.showAll')->with('success', "Car: $car->model delete ");
    }
}
