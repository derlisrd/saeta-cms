
@extends('Layout.app')


@section('title', 'Crear Usuario')

@section('container')
<form method="post" action="{{ route('users.store') }}">
    @csrf
<div class="container-xl">

    <div class="row">
        <div class="col-12">
            <h1>Agregar usuario</h1>
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
        <div class="col-12 col-md-6">
            <div class="form-group mt-4">
                <input name="name" autocomplete="off" class="form-control" value="{{ old('name') }}" required  placeholder="Nombre" />
                <small class="form-text text-muted">Nombre</small>
            </div>
            <div class="form-group mt-4">
                <input name="username" autocomplete="off" class="form-control" value="{{ old('username') }}" required  placeholder="Username" />
                <small class="form-text text-muted">Username</small>
            </div>
            <div class="form-group mt-4">
                <input name="email" type="email" autocomplete="off" class="form-control" value="{{ old('email') }}" required  placeholder="Email" />
                <small class="form-text text-muted">Email</small>
            </div>
        </div>

        <div class="col-12 col-md-6">
            <div class="form-group mt-4">
                <input name="password" type="password" autocomplete="off" class="form-control" required  placeholder="Contraseña" />
                <small class="form-text text-muted">Contraseña.</small>
            </div>
            <div class="form-group mt-4">
                <input name="confirm_password" type="password" autocomplete="off" class="form-control" required  placeholder="Repetir Contraseña" />
                <small class="form-text text-muted">Contraseña.</small>
            </div>
        </div>


        <div class="col-12">
            <button class="btn btn-primary mt-4" type="submit">Guardar</button>
        </div>

    </div>
</div>
</form>
@endsection

