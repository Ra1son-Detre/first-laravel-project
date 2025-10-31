    @extends('layouts.app')
    @section('title', 'Create car')
    @section('content')
    <h2>Create car</h2>
    <form method="post" action="{{route('cars.store')}}">
        @csrf
        <x-cars.select 
        name="brand_id" 
        label="Brand:" 
        :options="$brands" 
        :selected="old('brand_id', $car->brand_id ?? '')"
    />
        <x-cars.input label="Model" name="model" />
        <x-cars.input label="Price" name="price" />
        <x-cars.input label="Vin" name="vin" placeholder="Vin из 6 цифр."/>
        <x-cars.select label="Chose transmission:" name="transmission" :options="config('app-cars.transmissions')"  />
        
        <x-form-select multiple  class="form-label" name="tags[]" label="Tags" :options="$tags" :size="$tags->count()" placeholder="Не выбрано"></x-form-select>
        
        <select name="status" class="form-select">
    @foreach($status as $stat)
        <option value="{{ $stat->value }}">{{ $stat->text() }}</option>
    @endforeach
</select>
        <button>Send</button>
    </form>
    @endsection