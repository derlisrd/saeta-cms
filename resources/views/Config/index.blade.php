@extends('Layout.app')


@section('title','Configuración')

@section('container')
<form method="post" action="{{ route('config.store') }}">
@csrf
<div class="container">


<div class="row">
    <div class="col-12">
        <h1>Configuración de sitio</h1>
    </div>
    <div class="col-12">
        @if (session()->has('updated'))
        <div class="alert alert-success">
            Actualizado correctamente... <i class="fas fa-check"></i>
        </div>
        @endif
    </div>
    <div class="col-12">
        <div class="form-group mt-5">
            <input autofocus autocomplete="off" class="form-control" name="site_name" required value="{{ $site_name }}" />
            <small class="form-text text-muted">Nombre del sitio</small>
        </div>
    </div>

    <div class="col-12">
        <div class="form-group mt-5">
            <input class="form-control" name="site_description" required value="{{ $site_description }}" />
            <small class="form-text text-muted">Descripción del sitio</small>
        </div>
    </div>

    <div class="col-12">
        <div class="form-group mt-5">
            <input class="form-control" name="site_copyright" required value="{{ $site_copyright }}" />
            <small class="form-text text-muted">Copyright del sitio</small>
        </div>
    </div>
    <div class="col-12">
        <div class="input-group mt-3">
            <span class="input-group-btn">
                <a id="lfm" data-input="thumbnail" data-preview="holder"
                    class="btn btn-primary text-white">
                    <i class="fa fa-image"></i>Elegir
                </a>
            </span>
            <input id="thumbnail" placeholder="url de imagen destacada" class="form-control" type="text" name="site_cover">
        </div>
    </div>
    <div class="col-12">
        <div class="form-group mt-5">
            <input class="form-control" name="site_favicon"  value="{{ $site_favicon }}" />
            <small class="form-text text-muted">Favicon del sitio</small>
        </div>
    </div>
    <div class="col-12">
        <button type="submit" class="btn btn-outline-success mt-5">Guardar</button>
    </div>
</div>
</div>
</form>
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
