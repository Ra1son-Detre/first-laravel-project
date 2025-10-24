@extends('layouts.appBrend')

@section('title', 'Show Brands')

@section('content')

<div class="card shadow-sm border-0">
    <div class="card-header bg-primary text-white">
        <h3 class="mb-0">
            🚗 {{ $brand->id }} — {{ $brand->title  }}
        </h3>
    </div>

    <div class="card-body">
        <div class="row mb-3">
            <div class="col-md-6">
                <p><strong>Brand:</strong> {{ $brand->title }}</p>
                
            </div>
            <div class="col-md-6">
                <p><strong>Some:</strong></p>
                
            </div>
        </div>
    </div>

    <div class="card-footer d-flex justify-content-between align-items-center bg-light">
        <a href="{{route('brands.edit', $brand->id)}}" class="btn btn-outline-primary">
            ✏️ Edit Car
        </a>

        <form method="POST" :action="route('brands.destroy')" onsubmit="return confirm('Are you sure you want to delete?');">
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
    <a href="{{ route('brands.index') }} " class="btn btn-secondary">⬅️ Back to List</a>
</div>

@endsection