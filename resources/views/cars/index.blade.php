@extends('layouts.app')

@section('title', 'All Cars')

@section('content')


   <!--  @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert" id="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif  Перенес в layouts-->

    <h1 class="mb-4">All Cars</h1>

    <a href="{{ route('cars.create') }}" class="btn btn-success mb-3">Add Car</a>

    <div class="list-group">
        @foreach($cars as $car)
            <a href="{{ route('cars.showById', $car->id) }}" class="list-group-item list-group-item-action">
                <div class="d-flex justify-content-between">
                    <div>
                        <strong>Brand:</strong> {{ $car->brand->title ?? 'No brand' }}<br>
                        <strong>Model:</strong> {{ $car->model }}<br>
                        <strong>Country:</strong> {{ $car->brand->country->title ?? 'No Country' }}<br>
                        <p><strong>Status:</strong> {{ ucfirst($car->status->text()) }}</p> 
                        {{--<strong>Transmission:</strong> {{ $car->transmission }}<br> --}}
                        {{-- <strong>Vin:</strong> {{ $car->vin }}<br> --}}
                        
                    </div>
                    <span class="badge bg-primary align-self-center">${{ $car->price }}</span>
                </div>
            </a>
        @endforeach
    </div>

@endsection
