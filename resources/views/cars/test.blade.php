@extends('layouts.app')
@section('title', 'Test car')
@section('content')

<x-form action="{{route('cars.store')}}">
    <x-form-input name="Some" label="Марка чего-то"/>
    <x-form-select  m-select name="chose" Label="Da"  placeholder="Знач не выбрано"></x-form-select>
</x-form>


@endsection