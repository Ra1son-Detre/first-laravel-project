@extends('layouts.appBrend')
@section('title', 'Edit brand')
@section('content')

<div class="mb-4">
    <strong>Brand:</strong> {{$brand->title}}<br>
</div>

<div class="d-flex align-items-center gap-3">
    <form method="post" action="{{route('brands.update', $brand->id)}}" class="d-flex align-items-center gap-2 mb-0">
        @csrf
        @method('PATCH')
        <x-cars.input label="Change brand:" name="title" default-value="{{$brand->title}}"/>
        <button type="submit" class="btn btn-primary">Send</button>
    </form>
</div>
@endsection