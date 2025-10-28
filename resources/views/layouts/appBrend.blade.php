<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Brends App')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    {{-- Шапка --}}
    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
    <div class="container d-flex justify-content-between align-items-center">
        <a class="navbar-brand" href="{{ route('brands.index') }}"> Main 🏠 ®</a>
        
        <a href="{{ route('cars.showAll') }}" class="btn btn-primary mx-auto">
        🚘Перейти к машинам🚘
        </a>
            <a class="nav-link" href="{{ route('brands.create') }}">Add 🆕 Brend </a>
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