<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Cars App')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    {{-- Шапка --}}
    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
    <div class="container">
        <a class="navbar-brand" href="{{ route('cars.showAll') }}">Main 🚗</a>
        <div class="d-flex gap-2">
            <a class="btn btn-success btn-sm" href="{{ route('cars.create') }}">Add 🆕 Car</a>
            <a class="btn btn-outline-secondary btn-sm" href="{{ route('brands.index') }}">Brands 🔖</a>
            <a class="btn btn-warning btn-sm" href="{{ route('cars.showTrashCars') }}">Trash 🗑️</a>
        </div>
    </div>
</nav>

    @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert" id="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    
    {{-- Контент страниц --}}
    <div class="container">
        @yield('content')
    </div>

    <!-- JS Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>