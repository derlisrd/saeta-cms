@extends('Layout.app')


@section('title', 'Editar ad')

@section('container')
    <form method="post" action="{{ route('ads.update',$ad->id) }}">
        @method('PUT')
        @csrf
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>Agregar nuevo codigo de ads</h2>
                </div>
                <div class="col-12">
                    @if ($errors->any())
                        <div class="alert alert-info d-block">
                            @foreach ($errors->all() as $error)
                                <p>{{ $error }}</p>
                            @endforeach
                        </div>
                    @endif
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <div class="form-floating mt-4">
                            <input class="form-control" id="name" value="{{ old('name') ?? $ad->name }}"  name="name" placeholder="name">
                            <label for="name">Nombre</label>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="code" class="form-label mt-4">Codigo</label>
                        <textarea class="form-control" id="code" name="code" rows="5">{{ old('code') ?? $ad->code }}</textarea>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="form-check form-switch mt-4">
                        <input class="form-check-input cursor-pointer" name="movil" @if ($ad->movil)
                            checked
                        @endif type="checkbox" id="movil" >
                        <label class="form-check-label cursor-pointer" for="movil">Es para movil</label>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="form-group">
                        <label for="position" class="form-label mt-3">Posición</label>
                        <select class="form-select" id="position" name="position">
                          <option @if($ad->position==1) selected @endif value="1">En artículo top largo</option>
                          <option @if($ad->position==2) selected @endif value="2">En artículo bottom largo</option>
                          <option @if($ad->position==3) selected @endif value="3">Página inicial abajo</option>
                        </select>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="form-group">
                        <div class="form-floating mt-5">
                            <input class="form-control" id="height" value="{{ old('height') ?? $ad->height }}"  name="height" placeholder="height">
                            <label for="height">Altura</label>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="form-group">
                        <div class="form-floating mt-5">
                            <input class="form-control" id="width" value="{{ old('width') ?? $ad->width }}"  name="width" placeholder="width">
                            <label for="width">Ancho</label>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn rounded btn-primary mt-4">Actualizar</button>
                </div>
            </div>
        </div>

    </form>
@endsection