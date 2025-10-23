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
            <a class="navbar-brand" href="{{ route('cars.showAll') }}"> Main 🚗</a>
            <a class="nav-link" href="{{ route('cars.create') }}">Add 🆕 Car </a>
            <a class="nav-link" href="{{ route('cars.showTrashCars') }}">Trash 🗑️ Cars </a>
        </div>
    </nav>

    {{-- Контент страниц --}}
    <div class="container">
        @yield('content')
    </div>

    <!-- JS Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>