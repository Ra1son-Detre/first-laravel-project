@extends('layouts.app')
@section('title', 'Redaction car')
@section('content')

<div class="mb-4">
    <strong>Brand:</strong> {{$car->brand->title }}<br>
    <strong>Model:</strong> {{$cars->model}}<br>
    <strong>Price:</strong> ${{$cars->price}}
</div>

<div class="d-flex align-items-center gap-3">
    <form method="post" action="{{route('cars.update', $cars->id)}}" class="d-flex align-items-center gap-2 mb-0">
        @csrf
        @method('PATCH')
        <x-cars.input label="Change brand:" name="brand" default-value="{{$cars->brand}}"/>
        <x-cars.input label="Change model:" name="model" default-value="{{$cars->model}}"/>
        <x-cars.input label="Change price:" name="price" default-value="{{$cars->price}}"/>
        <x-cars.input label="Change vin:"   name="vin" default-value="{{$cars->vin}}" placeholder="Vin из 6 цифр." />
        <x-cars.select label="Change transmission:" name="transmission" :options="config('app-cars.transmissions')"  /> {{-- :selected="old('transmission')/>  --}}
        <button type="submit" class="btn btn-primary">Send</button>
    </form>
</div>
@endsection