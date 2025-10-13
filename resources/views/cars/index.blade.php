<head>
    <title>All Cars</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<div>
    <p>All cars.</p>
</div>

<a href="/cars/create">Add car</a>

<ul>
    @foreach($cars as $car)
        <li>
            <a href="/cars/{{ $car->id }}">
                {{ $car->brand }} {{ $car->model }}
            </a>
        </li>
    @endforeach
</ul>
<div> @if (session('success'))
    <div class="alert alert-success" > {{session('success')}}</div>
    @endif
</div>
