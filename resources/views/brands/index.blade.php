@extends('layouts.appBrend')

@section('title', 'Brands')

@section('content')
@if($brands->isNotEmpty())    
<h1 class="mb-4">All Brands</h1>

    <a href="{{ route('brands.create') }}" class="btn btn-success mb-3">Add Brand</a>

    <div class="list-group">
        @foreach($brands as $brand)
        <div class="card mb-3 p-3 border rounded">    
        <a href="{{ route('brands.show', $brand->id) }}" class="list-group-item list-group-item-action">
                <div class="d-flex justify-content-between">
                    <div>
                        <strong>Brand:</strong> {{ $brand->title }}<br>
                        
                    </div>
                </div>
            </a></div> 
        @endforeach
    </div>
    @else
    <div class="alert alert-info"> Записей нет, делайте первую!</div>
    @endif

@endsection
