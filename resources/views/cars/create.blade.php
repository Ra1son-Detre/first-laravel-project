<h2>Create car</h2>
<form method="post" action="/cars">
    @csrf
    <div>Brand: <input name="brand" value="{{ old('brand') }}"></div>
    <div>Model: <input name="model" value="{{ old('model') }}"></div>
    <div>Price: <input name="price" value="{{ old('price') }}"></div>
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