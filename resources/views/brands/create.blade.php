@extends('layouts.appBrend')
@section('title', 'Create brand')
@section('content')

<h2>Create brand</h2>
<form method="post" action="{{route('brands.store')}}">
    @csrf
    
    <x-cars.input label="Марка авто" name="title" />
    <button>Send</button>
</form>
@endsection