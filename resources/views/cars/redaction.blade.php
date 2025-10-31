@extends('layouts.app')

@section('title', 'Redaction car')

@section('content')

<div class="mb-4">
    <strong>Brand:</strong> {{ $car->brand->title }}<br>
    <strong>Model:</strong> {{ $car->model }}<br>
    <strong>Price:</strong> ${{ $car->price }}
</div>

<form method="post" action="{{ route('cars.update', $car->id) }}" class="mb-4">
    @csrf
    @method('PATCH')

    <div class="mb-3">
        <x-cars.select 
            name="brand_id" 
            label="Brand:" 
            :options="$brands" 
            :selected="old('brand_id', $car->brand_id ?? '')" 
        />
    </div>

    <div class="mb-3">
        <x-cars.input label="Change model:" name="model" default-value="{{ $car->model }}"/>
    </div>

    <div class="mb-3">
        <x-cars.input label="Change price:" name="price" default-value="{{ $car->price }}"/>
    </div>

    <div class="mb-3">
        <x-cars.input label="Change vin:" name="vin" default-value="{{ $car->vin }}" placeholder="Vin"/>
    </div>

    <div class="mb-3">
        <x-cars.select 
            label="Change transmission:" 
            name="transmission" 
            :options="config('app-cars.transmissions')" 
            :selected="old('transmission', $car->transmission)" 
        />
    </div>

    <div class="mb-3">
    <x-form-select 
    name="tags[]" 
    label="Tags"
    multiple 
    many-relation 
    :options="$tags" 
    :bind="$car"
/>
   
    </div>

    <button type="submit" class="btn btn-primary">Send</button>
</form>

@endsection