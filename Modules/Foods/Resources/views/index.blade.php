@extends('foods::layouts.master')

@section('content')
    <h1>Hello World</h1>

    <p>
        This view is loaded from module: {!! config('foods.name') !!}
    </p>
    <example-component></example-component>
@endsection
