@extends('Layout.app')


@section('title', 'Nueva categoría')

@section('container')

<div class="container">
    <form method="post" action="{{ route('posts.category.store') }}">
        @csrf
    <div class="row">
        <div class="col-12"><h3>Nueva categoría</h3></div>
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
                <input required autofocus autocomplete="off" name="title" value="{{ old('title') }}"  class="form-control" id="title"  placeholder="Título">
                <small id="title" class="form-text text-muted">Ingrese el título.</small>
            </div>
        </div>
        <div class="col-12 col-sm-6">
            <div class="form-group mt-3">
                <input required autocomplete="off" name="slug" name="slug" value="{{ old('title') }}"  class="form-control" id="title"  placeholder="Slug">
                <small id="title" class="form-text text-muted">Ingrese el slug. Ej: 'nombre-de-categoria' </small>
            </div>
        </div>
        <div class="col-12">
            <div class="input-group mt-3">
                <span class="input-group-btn">
                    <a id="lfm" data-input="thumbnail" data-preview="holder"
                        class="btn btn-primary text-white">
                        <i class="fa fa-image"></i>Elegir portada
                    </a>
                </span>
                <input id="thumbnail" placeholder="url de imagen destacada" class="form-control" type="text" name="image">
            </div>
        </div>
        <div class="col-12">
            <div class="form-group">
                <label for="description" class="form-label mt-4">Descripción</label>
                <textarea class="form-control" name="description" id="exampleTextarea" rows="3">{{ old('description') }}</textarea>
            </div>
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-outline-success mt-4">Guardar</button>
        </div>
    </div>
    </form>
</div>

@endsection

@section('scripts')
<script>
    {!! \File::get(base_path('vendor/unisharp/laravel-filemanager/public/js/stand-alone-button.js')) !!}
</script>
<script>
    $('#lfm').filemanager('image', {
        prefix: '/admin/filemanager'
    });
</script>
@endsection
