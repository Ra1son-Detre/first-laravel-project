<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Car;
use App\Http\Requests\Cars\Save as SaveRequest;

class Cars extends Controller
{
    public function index()
    {
        $cars = Car::orderBy('brand')->get();
        return view('cars.index',compact('cars'));
        /* dd($cars); */
    }

    
    public function create()
    {
        return view('cars.create');
    }

    
    public function store(SaveRequest $request)
    {
        
        $car = Car::create($request->validated());
        $cars = Car::all();
        return redirect()->route('cars.showAll')->with('success', __('alerts.cars.store', ['brand' => $car->brand, 'model' => $car->model])); // в контроеллере не стоит текстовые сообщения выводить, надо делать конфиг файл под сообщения 
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

  
    public function update(SaveRequest $request, $id) //пофиксить и разобраться какого хуя не рабоатет с SaveReauest покопаться в Put и patch
    {
       
       $car = Car::findOrFail($id);
       $car->update($request->validated());
       $oldModel = $car->model; //старое значение в переменной до изменения (тут можно добавить идею мол что на что поменяли при выводе сообщ. но надо бы отдельный еласс под такое реализовать)
       
       return redirect('/cars')->with('success', __ ('alerts.cars.update',['oldModel' => $oldModel]));// в контроеллере не стоит текстовые сообщения выводить, надо делать конфиг файл под сообщения 
    }

 
    public function destroy($id) //проблема поч ищу в ручную это в маршрутах и Route Model Binding уточнить у сенсеев !!!
    {
        $car = Car::findOrFail($id);
        $car->delete();
        return redirect()->route('cars.showAll')->with('success', __ ('alerts.cars.destroy', ['brand' => $car->brand, 'model' => $car->model]));// в контроеллере не стоит текстовые сообщения выводить, надо делать конфиг файл под сообщения 
    }


    public function redactionById($id) 
    {
        $car = Car::findOrFail($id);
        return view('cars.redaction', ['cars'=>$car]);
    }

    public function showTrashCars()
    {
        $trashCars = Car::onlyTrashed()->orderByDesc('created_at')->get(); // ТОЛЬКО удаленные записи после мягкого удаления
        return view('cars.trash' , compact('trashCars'));
    }

    public function restore ($id)
    {
       $trashCar = Car::onlyTrashed()->findOrFail($id);

        // Для случае если запись уже удалена из базы надо использовать try catch 

        $trashCar->restore();

        return redirect()->route('cars.showAll')->with('success', __('alerts.cars.restore', ['brand' => $trashCar->brand, 'model' => $trashCar->model]));
    }

    public function destroyForever ($id) 
    {   
        $car = Car::withTrashed()->findOrFail($id);
        $car->forceDelete();

        return redirect()->route('cars.showAll')->with('success', __('alerts.cars.destroyForever', ['brand'=> $car->brand, 'model'=>$car->model]));
    }

    public function check() 
    {
        dd(config('app-cars.transmissions'));
    }

    public function test() 
    {
        
        return view('cars.test');
    }
}
