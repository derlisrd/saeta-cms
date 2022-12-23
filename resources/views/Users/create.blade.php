
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
        <div class="col-12 col-md-6">
            <div class="form-group mt-4">
                <input name="name" autofocus autocomplete="off" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required  placeholder="Nombre" />
                @error('name')
                    <small class="form-text text-danger">{{ $message }} </small>
                @enderror
            </div>
            <div class="form-group mt-4">
                <input name="username" autocomplete="off" class="form-control @error('username') is-invalid @enderror" value="{{ old('username') }}" required  placeholder="Username" />
                @error('username')
                    <small class="form-text text-danger">{{ $message }} </small>
                @enderror
            </div>
            <div class="form-group mt-4">
                <input name="email" type="email" autocomplete="off" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required  placeholder="Email" />
                @error('email')
                    <small class="form-text text-danger">{{ $message }} </small>
                @enderror
            </div>
        </div>

        <div class="col-12 col-md-6">
            <div class="form-group mt-4">
                <input name="password" placeholder="Contraseña" type="password" autocomplete="off" class="form-control @error('password') is-invalid @enderror required  placeholder="Contraseña" />
                @error('password')
                    <small class="form-text text-danger">{{ $message }} </small>
                @enderror
            </div>
            <div class="form-group mt-4">
                <input name="confirm_password" placeholder="Repetir contraseña" type="password" autocomplete="off" class="form-control @error('confirm_password') is-invalid @enderror required  placeholder="Repetir Contraseña" />
                @error('confirm_password')
                    <small class="form-text text-danger">{{ $message }} </small>
                @enderror
            </div>
        </div>


        <div class="col-12">
            <button class="btn btn-primary mt-4" type="submit">Guardar</button>
        </div>

    </div>
</div>
</form>
@endsection

