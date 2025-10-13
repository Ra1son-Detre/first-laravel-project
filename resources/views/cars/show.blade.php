<div>
Brand: {{$cars->brand}}
</div>
Model: {{$cars->model}}
<br>
Price: {{$cars->price}}$
<form method="post" action="/cars/{{$cars->id}}">
    @csrf
    @method('PATCH')
    <div>Change price: <input name="price" value="{{ old('price') }}"></div>
    <hr>
    @if ($errors->any())
    <div style="color:red">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
         </ul>
        </div>
    <hr>
    @endif
    <button>Send</button>
</form>
