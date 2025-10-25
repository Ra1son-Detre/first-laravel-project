@extends('layouts.app')

@section('title', 'Show Car')

@section('content')

<div class="card shadow-sm border-0">
    <div class="card-header bg-primary text-white">
        <h3 class="mb-0">
            🚗 {{ $cars->brand->title  }} — {{ $cars->model }}
        </h3>
    </div>

    <div class="card-body">
        <div class="row mb-3">
            <div class="col-md-6">
                <p><strong>Brand:</strong> {{ $cars->brand->title }}</p>
                <p><strong>Model:</strong> {{ $cars->model }}</p>
                <p><strong>Transmission:</strong> {{ ucfirst($cars->transmission) }}</p>
            </div>
            <div class="col-md-6">
                <p><strong>VIN:</strong> {{ strtoupper($cars->vin) }}</p>
                <p><strong>Price:</strong> <span class="text-success fw-bold">${{ number_format($cars->price, 2, '.', ',') }}</span></p>
                <p><strong>Created:</strong> {{ $cars->created_at->format('d.m.Y H:i') }}</p>
            </div>
        </div>
    </div>

    <div class="card-footer d-flex justify-content-between align-items-center bg-light">
        <a href="{{ route('cars.redactionById', $cars->id) }}" class="btn btn-outline-primary">
            ✏️ Edit Car
        </a>

        <form method="POST" action="{{ route('cars.delete', $cars->id) }}" onsubmit="return confirm('Are you sure you want to delete {{ $cars->model }}?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-outline-danger">
                🗑️ Delete
            </button>
        </form>
    </div>
</div>

{{-- Кнопка назад --}}
<div class="mt-4">
    <a href="{{ route('cars.showAll') }}" class="btn btn-secondary">⬅️ Back to List</a>
</div>

@endsection