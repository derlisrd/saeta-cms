@extends('Layout.app')


@section('title','Configuración')

@section('container')
<form method="post" action="{{ route('config.store') }}">
@csrf
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
        <button type="submit" class="btn btn-outline-success mt-5">Guardar</button>
    </div>


</div>
</form>
@endsection
