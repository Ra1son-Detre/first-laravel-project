@extends('layouts.app')

@section('title', 'Show Car')

@section('content')

<div class="card shadow-sm border-0">
    <div class="card-header bg-primary text-white">
        <h3 class="mb-0">
            🚗 {{ $car->brand->title  }} — {{ $car->model }}
        </h3>
    </div>
    <br><h2>Характеристики:</h2><br>
    <div class="card-body">
        <div class="row mb-3">
            <div class="col-md-6">
                <p><strong>Brand:</strong> {{ $car->brand->title }}</p>
                <p><strong>Model:</strong> {{ $car->model }}</p>
                <p><strong>Transmission:</strong> {{ ucfirst($car->transmission) }}</p>
                <p><strong>Status:</strong> {{ ucfirst($car->status->text()) }}</p> 
            </div>
            <div class="col-md-6">
                <p><strong>VIN:</strong> {{ strtoupper($car->vin) }}</p>
                <p><strong>Price:</strong> <span class="text-success fw-bold">${{ number_format($car->price, 2, '.', ',') }}</span></p>
                <p><strong>Created:</strong> {{ $car->created_at->format('d.m.Y H:i') }}</p>
                <p><strong>Tags:</strong>
                @if($car->tags->isNotEmpty())
                 {{ $car->tags->pluck('title')->sort()->implode(', ') }}
                @else
                <em>no tags</em>
                 @endif
                </p>

            </div>
        </div>
    </div>
   
    <div class="card-footer d-flex justify-content-between align-items-center bg-light">
        <a href="{{ route('cars.redactionById', $car->id) }}" class="btn btn-outline-primary">
            ✏️ Edit Car
        </a>
        @if ($car->canDelete)
        <form method="POST" action="{{ route('cars.delete', $car->id) }}" onsubmit="return confirm('Are you sure you want to delete {{ $car->model }}?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-outline-danger">
                🗑️ Delete
            </button>
        </form>
        @endif
    </div>
</div>

{{-- Кнопка назад --}}
<div class="mt-4">
    <a href="{{ route('cars.showAll') }}" class="btn btn-secondary">⬅️ Back to List</a>
</div>

@endsection