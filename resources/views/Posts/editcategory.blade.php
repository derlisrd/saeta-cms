@extends('Layout.app')


@section('title', $category->title)

@section('container')

<div class="container">
    <form method="post" action="{{ route('posts.category.update',$category->id) }}">
        @csrf

    <div class="row">
        <div class="col-12"><h3>Editar categoría</h3></div>
        <div class="col-12">
            @if ($errors->any())
            <div class="alert alert-info d-block">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif
        </div>
        <div class="col-12 col-sm-6">
            <div class="form-group mt-3">
                <input required autofocus autocomplete="off" name="title" name="title" value="{{ $category->title }}"  class="form-control" id="title"  placeholder="Título">
                <small id="title" class="form-text text-muted">Edite el título.</small>
            </div>
        </div>
        <div class="col-12 col-sm-6">
            <div class="form-group mt-3">
                <input required autocomplete="off" name="slug" name="slug" value="{{ $category->slug }}"  class="form-control" id="title"  placeholder="Slug">
                <small id="title" class="form-text text-muted">Edite el slug. Ej: 'nombre-de-categoria' </small>
            </div>
        </div>
        <div class="col-12">
            <div class="form-group">
                <label for="description" class="form-label mt-4">Descripción</label>
                <textarea class="form-control" name="description" id="exampleTextarea" rows="3">{{ $category->description}}</textarea>
            </div>
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-outline-success mt-4">Guardar</button>
        </div>
    </div>
    </form>
</div>

@endsection
