@extends('layouts.app')
@section('title', 'Show car')
@section('content')


<div class="mb-4">
    <strong>Brand:</strong> {{$cars->brand}}<br>
    <strong>Model:</strong> {{$cars->model}}<br>
    <strong>Transmission:</strong> {{$cars->transmission}}<br>
    <strong>Vin:</strong> {{$cars->vin}}<br>
    <strong>Price:</strong> ${{$cars->price}}
</div>

<div class="d-flex align-items-center gap-3">
<a href="{{ route('cars.redactionById', $cars->id) }}" class="btn btn-success mb-3">Redaction</a>

    <form method="post" action="{{route('cars.delete', [$cars->id])}}" class="mb-0">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete: {{$cars->model}}</button>
    </form>
</div>
@endsection