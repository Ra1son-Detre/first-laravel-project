@extends('layouts.app')

@section('title', 'Redaction car')

@section('content')

<div class="mb-4">
    <strong>Brand:</strong> {{ $cars->brand->title }}<br>
    <strong>Model:</strong> {{ $cars->model }}<br>
    <strong>Price:</strong> ${{ $cars->price }}
</div>

<form method="post" action="{{ route('cars.update', $cars->id) }}" class="mb-4">
    @csrf
    @method('PATCH')

    <div class="mb-3">
        <x-cars.select 
            name="brand_id" 
            label="Brand:" 
            :options="$brands" 
            :selected="old('brand_id', $cars->brand_id ?? '')" 
        />
    </div>

    <div class="mb-3">
        <x-cars.input label="Change model:" name="model" default-value="{{ $cars->model }}"/>
    </div>

    <div class="mb-3">
        <x-cars.input label="Change price:" name="price" default-value="{{ $cars->price }}"/>
    </div>

    <div class="mb-3">
        <x-cars.input label="Change vin:" name="vin" default-value="{{ $cars->vin }}" placeholder="Vin"/>
    </div>

    <div class="mb-3">
        <x-cars.select 
            label="Change transmission:" 
            name="transmission" 
            :options="config('app-cars.transmissions')" 
        />
    </div>

    <div class="mb-3">
        <x-form-select 
            multiple
            class="form-label"
            name="tags[]"
            label="Tags"
            :options="$tags"
            :size="$tags->count()"
            placeholder="Не выбрано"
            many-relation
        />
    </div>

    <button type="submit" class="btn btn-primary">Send</button>
</form>

@endsection