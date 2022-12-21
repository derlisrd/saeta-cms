@extends('Layout.app')


@section('title', 'Crear Menu')

@section('container')
<form method="post" action="{{ route('menu.store') }}">
    @csrf
<div class="row">
    <div class="col-12">
        <div class="form-group mt-5">
            <input name="title" autofocus autocomplete="off" class="form-control" value="{{ old('title') }}" required  placeholder="Título" />
        </div>
    </div>

    @livewire('menu')

    <div class="col-12">
        <button class="btn btn-primary mt-5" type="submit">Guardar</button>
    </div>

</div>
</form>
@endsection
