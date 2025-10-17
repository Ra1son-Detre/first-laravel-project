<a href="{{route('cars.showAll')}}"> Main</a>
<div>
Brand: {{$cars->brand}}
</div>
Model: {{$cars->model}}
<br>
Price: {{$cars->price}}$
<form method="post" action="/cars/{{$cars->id}}">
    @csrf
    @method('PATCH')
    <x-cars.input label="Change price:" name="price" default-value="{{$cars->price}}"/>
    <button>Send</button>
</form>

<form method="post" action="{{route('cars.delete', [$cars->id])}}">
    @csrf
    @method('DELETE')
    
    <button type="submit" onclick="return confirm('Are you sure?')">Delete</button>
</form>