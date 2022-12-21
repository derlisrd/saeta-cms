@extends('Layout.app')


@section('title', 'Crear Menu')

@section('container')
<div class="row">
    <div class="col-12">
        <div class="form-group mt-5">
            <input name="title" autofocus autocomplete="off" class="form-control" value="{{ old('title') }}" required  placeholder="Título" />
        </div>
    </div>

    <div class="col-12">
        <div class="form-group mt-5">
            <select class="form-select" name="type">
                <option selected disabled>Seleccione referencia</option>
                <option value="category">Categoría</option>
                <option value="post">Artículo</option>
              </select>
        </div>
    </div>
</div>
@endsection
