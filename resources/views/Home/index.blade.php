@extends('Layout.app')


@section('title','Home')

@section('container')

<div class="container xl">
    <h2>Bienvenid@ {{ Auth::user()->name }}</h2>
</div>

@endsection
