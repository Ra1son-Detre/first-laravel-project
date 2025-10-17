@extends('layouts.app')
@section('title', 'Show car')
@section('content')


<div class="mb-4">
    <strong>Brand:</strong> {{$cars->brand}}<br>
    <strong>Model:</strong> {{$cars->model}}<br>
    <strong>Price:</strong> ${{$cars->price}}
</div>

<div class="d-flex align-items-center gap-3">
    <form method="post" action="/cars/{{$cars->id}}" class="d-flex align-items-center gap-2 mb-0">
        @csrf
        @method('PATCH')
        <x-cars.input label="Change price:" name="price" default-value="{{$cars->price}}"/>
        <button type="submit" class="btn btn-primary">Send</button>
    </form>

    <form method="post" action="{{route('cars.delete', [$cars->id])}}" class="mb-0">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete: {{$cars->model}}</button>
    </form>
</div>
@endsection