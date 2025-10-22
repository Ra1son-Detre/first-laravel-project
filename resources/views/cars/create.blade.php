@extends('layouts.app')
@section('title', 'Create car')
@section('content')
<h2>Create car</h2>
<form method="post" action="{{route('cars.store')}}">
    @csrf
    <x-cars.input label="Brand" name="brand" />
    <x-cars.input label="Model" name="model" />
    <x-cars.input label="Price" name="price" />
    <x-cars.input label="Vin" name="vin" placeholder="Vin из 6 цифр."/>
    <x-cars.select label="Change transmission:" name="transmission" :options="config('app-cars.transmissions')"  />
    <button>Send</button>
</form>
@endsection