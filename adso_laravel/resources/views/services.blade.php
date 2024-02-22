@extends('layouts.landing')

@section('title', 'Servicios')

@section('content')

    <h1>Index</h1>
    @component('_components.card')
        @slot('title','service1')
        @slot('content','lorem ipsum..')
    @endcomponent
    <br>

    @component('_components.card')
        @slot('title','service2')
        @slot('content','lorem ipsum..')
    @endcomponent

@endsection