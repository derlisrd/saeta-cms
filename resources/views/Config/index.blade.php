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
    <div class="col-12 col-md-6">
        <div class="form-group mt-2">
            <input autofocus autocomplete="off" class="form-control" name="site_name" required value="{{ $site_name }}" />
            <small class="form-text text-muted">Nombre del sitio</small>
        </div>
    </div>
    <div class="col-12 col-md-6">
        <div class="form-group mt-2">
            <input class="form-control" name="site_description" required value="{{ $site_description }}" />
            <small class="form-text text-muted">Descripción del sitio</small>
        </div>
    </div>

    <div class="col-12 col-md-6 mt-3">
        <h4>Tipo de página inicial: </h4>
        <div class="form-check">
            <input class="form-check-input" type="radio" value="articles" @if($site_intro=='articles') checked @endif name="site_intro" id="articles_type">
            <label class="form-check-label cursor-pointer" for="articles_type">
              Artículos
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" value="article" @if($site_intro=='article') checked @endif name="site_intro" id="article_type">
            <label class="form-check-label cursor-pointer" for="article_type">
              Un sólo artículo
            </label>
        </div>
    </div>

    <div class="col-12">
        <div class="form-group mt-2">
            <input class="form-control" name="site_copyright" required value="{{ $site_copyright }}" />
            <small class="form-text text-muted">Copyright del sitio</small>
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
            <input id="thumbnail" placeholder="url de imagen destacada" class="form-control" type="text" value="{{ $site_cover ?? '' }}" name="site_cover">
        </div>
    </div>
    <div class="col-12">
        <div class="input-group mt-3">
            <span class="input-group-btn">
                <a id="logo" data-input="thumbnail_logo" data-preview="holder"
                    class="btn btn-primary text-white">
                    <i class="fa fa-image"></i>Elegir logo
                </a>
            </span>
            <input id="thumbnail_logo" placeholder="url de logo" class="form-control" type="text" value="{{ $site_logo ?? '' }}" name="site_logo">
        </div>
    </div>
    <div class="col-12">
        <div class="input-group mt-3">
            <span class="input-group-btn">
                <a id="site_favicon" data-input="thumbnail_site_favicon" data-preview="holder"
                    class="btn btn-primary text-white">
                    <i class="fa fa-image"></i>Elegir favicon
                </a>
            </span>
            <input id="thumbnail_site_favicon" placeholder="url de logo" class="form-control" type="text" value="{{ $site_favicon ?? '' }}" name="site_favicon">
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
    $('#logo').filemanager('image', {
        prefix: '/admin/filemanager'
    });
    $('#site_favicon').filemanager('image', {
        prefix: '/admin/filemanager'
    });
</script>
@endsection
