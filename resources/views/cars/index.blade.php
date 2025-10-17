<head>
    <title>All Cars</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<div>
    <p>All cars.</p>
</div>
<a href="{{route('cars.create')}}">Add car</a>
<ul>
    @foreach($cars as $car)
        <li>
            <a href="{{route('cars.showById', [$car->id])}}">
                Model: {{ $car->brand }} <br> Brand: {{ $car->model }}
                <br></br>
            </a>
        </li>
    @endforeach
</ul>
<div> @if (session('success'))
    <div class="alert alert-success" > {{session('success')}}</div>
    @endif
</div>
