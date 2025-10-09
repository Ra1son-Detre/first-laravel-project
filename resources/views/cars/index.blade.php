<div>
<p> All cars.</p>
</div>
<a href="/cars/create">Add car</a>
<ul>
    @foreach($cars as $car)
    <li>Brand:{{$car->brand}}.   <br> Model: <strong>{{$car->model}}</strong> <br> <div> Price: {{$car->price}} $</div></li> <br>
    @endforeach
</ul>