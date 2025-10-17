<a href="{{route('cars.showAll')}}"> Main</a>
<h2>Create car</h2>
<form method="post" action="{{route('cars.store')}}">
    @csrf
    <x-cars.input label="Brand" name="brand" />
    <x-cars.input label="Model" name="model" />
    <x-cars.input label="Price" name="price" />
    
    <button>Send</button>
</form>