@extends('Layout.app')


@section('title', 'Crear Menu')

@section('container')
<div class="row">
    <div class="col-12">
        <div class="form-group mt-5">
            <input name="title" autofocus autocomplete="off" class="form-control" value="{{ old('title') }}" required  placeholder="Título" />
        </div>
    </div>

    @livewire('menu')

</div>
@endsection
