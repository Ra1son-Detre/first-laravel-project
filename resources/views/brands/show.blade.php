@extends('layouts.appBrend')

@section('title', 'Show Brand')

@section('content')

<div class="card shadow-sm border-0">
    <div class="card-header bg-primary text-white">
        <h3 class="mb-0">
            🚗 {{ $brand->id }} — {{ $brand->title }}:
        </h3>
    </div>

    @foreach ($brand->cars as $car)
    <div class="card mb-3 p-3 border rounded">   
        <div class="card-body">
        <div class="row mb-1">
            <div class="col-md-6">
                <p><strong>Model {{$loop->iteration}}:</strong> {{ $car->model }}</p>
                <p><strong>Transmission:</strong> {{ $car->transmission }}</p>
                <p><strong>Vin:</strong> {{ $car->vin }}</p>
                <p><strong>Price:</strong> ${{ $car->price }}</p>
            </div>
        </div>
    </div>
</div>
    @endforeach

    <div class="card-footer d-flex justify-content-between align-items-center bg-light">
        <a href="{{ route('brands.edit', $brand->id) }}" class="btn btn-outline-primary">
            ✏️ Edit Brand
        </a>

        <form method="POST" action="{{ route('brands.destroy', $brand->id) }}" onsubmit="return confirm('Are you sure you want to delete?');">
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
    <a href="{{ route('brands.index') }}" class="btn btn-secondary">⬅️ Back to List</a>
</div>

@endsection