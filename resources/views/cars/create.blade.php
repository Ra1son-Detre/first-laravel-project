@extends('layouts.app')

@section('title', 'Create car')

@section('content')
<h2>Create car</h2>

<form method="post" action="{{ route('cars.store') }}">
    @csrf

    {{-- Select brand --}}
    <x-cars.select 
        name="brand_id" 
        label="Brand:" 
        :options="$brands" 
        :selected="old('brand_id', $car->brand_id ?? '')"
    />

    {{-- Model --}}
    <x-cars.input 
        label="Model" 
        name="model" 
        :value="old('model', $car->model ?? '')"
    />

    {{-- Price --}}
    <x-cars.input 
        label="Price" 
        name="price" 
        :value="old('price', $car->price ?? '')"
    />

    {{-- Vin --}}
    <x-cars.input 
        label="Vin" 
        name="vin" 
        placeholder="Vin из 6 цифр."
        :value="old('vin', $car->vin ?? '')"
    />

    {{-- Transmission --}}
    <x-cars.select 
        name="transmission" 
        label="Choose transmission:" 
        :options="array_combine(config('app-cars.transmissions'), config('app-cars.transmissions'))"
        :selected="old('transmission', $car->transmission ?? '')"
    />

    <button type="submit" class="btn btn-primary">Send</button>
</form>
@endsection