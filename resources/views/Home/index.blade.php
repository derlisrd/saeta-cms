@extends('Layout.app')


@section('title','Home')

@section('container')

<div class="container xl">
    <h2>Bienvenid@ {{ Auth::user()->name }}</h2>

    @if($comentarios>0)
    <div class="alert alert-warning" role="alert">
        <h4 class="alert-heading">Buenas nuevas!</h4>
        <p>Hay comentarios nuevos</p>
        <hr>
        <a href="{{ route('posts.comments') }}" class="btn btn-success">Ver todos</a>
      </div>
    @endif
</div>

@endsection
