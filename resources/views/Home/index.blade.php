@extends('Layout.app')


@section('title','Home')

@section('container')

<h2>Bienvenid@ {{ Auth::user()->name }}</h2>

@endsection
