<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Car;
use App\Http\Requests\Cars\Save as SaveRequest;
use App\Models\Brand;
use App\Models\Tag;

class Cars extends Controller
{
    public function index()
    {
        $cars = Car::with('brand')->orderBy('created_at')->get(); //это не жадная загрузка получить все машины с их брендами, отсортированные по дате создания
        return view('cars.index',compact('cars'));
        /* dd($cars); */
    }

    
    public function create()
    {
        $brands = Brand::orderBy('title')->pluck('title', 'id');// pluck делает массив двухмерным вторым параметром ключь 
        $tags = Tag::orderBy('title')->pluck('title', 'id');
        
        return view('cars.create', compact('brands', 'tags'));
    }

    
    public function store(SaveRequest $request)
    {   
        $data = collect($request->validated()); //Валидацию превращаем в лара коллекцию

        $car = Car::create($data->except(['tags'])->toArray()); //исключаем отсюда таги, после чего превращаем в массив модель приним массив а не коллекцию 
        $car->tags()->sync($data->get('tags')); // добавляем таги в табл которая описана в модели Car 

        return redirect()->route('cars.showAll')->with('success', __('alerts.cars.store', ['brand' => $car->brand->title, 'model' => $car->model])); // выводится весь объект Eloquent стоит быть внимательным при выводе 
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

  
    public function update(SaveRequest $request, Car $car) //todo пофиксить и разобраться какого хуя не рабоатет с SaveReauest покопаться в Put и patch
    {
       
      /*  $car = Car::findOrFail($id); */
       $data = collect($request->validated());
       $oldModel = $car->model; 
       $car->update($data->except(['tags'])->toArray());
       $car->tags()->sync($data->get('tags', []));
       
       
       return redirect('/cars')->with('success', __ ('alerts.cars.update',['oldModel' => $oldModel]));// 
    }

 
    public function destroy($id) //проблема поч ищу в ручную это в маршрутах и Route Model Binding уточнить у сенсеев !!!
    {
        $car = Car::findOrFail($id);
        $car->delete();
        return redirect()->route('cars.showAll')->with('success', __ ('alerts.cars.destroy', ['brand' => $car->brand, 'model' => $car->model]));// в контроеллере не стоит текстовые сообщения выводить, надо делать конфиг файл под сообщения 
    }


    public function redactionById($id) // по хорошему перенести в едит это все но потом на свежую голову 
    {
        $cars = Car::findOrFail($id);
        $tags = Tag::orderBy('title')->pluck('title', 'id');
        $brands = Brand::orderBy('title')->pluck('title', 'id');
        return view('cars.redaction', compact('cars', 'brands', 'tags'));
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

        return redirect()->route('cars.showTrashCars')->with('success', __('alerts.cars.destroyForever', ['brand'=> $car->brand, 'model'=>$car->model]));
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
