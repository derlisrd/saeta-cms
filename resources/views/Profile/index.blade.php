@extends('Layout.app')


@section('title', 'Perfil')

@section('container')
    <div class="container">


            <div class="row">
                <div class="col-12">
                    <h1>Configuración de usuario</h1>
                </div>
                <div class="col-12">
                    @if($errors->any())
                        <div class="alert alert-danger text-white">{{$errors->first()}}</div>
                    @endif
                    @if (session()->has('updated'))
                        <div class="alert alert-success">
                            Actualizado correctamente... <i class="fas fa-check"></i>
                        </div>
                    @endif
                </div>

                <div class="col-12 col-sm-12 col-md-6">
                        <form method="post" action="{{ route('profile.update') }}">
                            @csrf
                        <div class="row mt-4">
                            <div class="col-12">
                                <h4>Perfil</h4>
                            </div>
                            <div class="col-12">
                                <div class="form-group mt-4">
                                    <input name="name" class="form-control" autofocus autocomplete="off" value="{{ $profile->name }}" required />
                                    <small class="form-text text-muted">Nombre</small>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group mt-4">
                                    <input name="username" class="form-control" autocomplete="off" value="{{ $profile->username }}"
                                        required />
                                    <small class="form-text text-muted">Username</small>
                                </div>
                            </div>
                            <div class="col-12 mt-4">
                                <div class="form-group">
                                    <input name="email" class="form-control" autocomplete="off" value="{{ $profile->email }}"
                                        required />
                                    <small class="form-text text-muted">Email</small>
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary rounded mt-4">Guardar</button>
                            </div>
                        </div>
                    </form>
                    </div>

                <div class="col-12 col-sm-12 col-md-6">
                    <form method="post" action="{{ route('profile.save.pass') }}">
                        @csrf
                        <div class="row mt-4">
                            <div class="col-12">
                                @if (session()->has('updatedpass'))
                                <div class="alert alert-success">
                                    Contraseña actualizada correctamente... <i class="fas fa-check"></i>
                                </div>
                                @endif
                            </div>
                            <div class="col-12">
                                <h4>Contraseña</h4>
                            </div>
                            <div class="col-12 mt-4">
                                <div class="form-group">
                                        @if($errors->any('old_password'))
                                            <span class="text-danger">{{ $errors->first('old_password') }}</span>
                                        @endif
                                    <input name="old_password" type="password" class="form-control" autocomplete="off" required />
                                    <small class="form-text text-muted">Contraseña actual</small>
                                </div>
                            </div>
                            <div class="col-12 mt-4">
                                <div class="form-group">
                                    @if($errors->any('new_password'))
                                        <span class="text-danger">{{ $errors->first('new_password') }}</span>
                                    @endif
                                    <input name="new_password" type="password" class="form-control" autocomplete="off" required />
                                    <small class="form-text text-muted">Contraseña nueva</small>
                                </div>
                            </div>
                            <div class="col-12 mt-4">
                                <div class="form-group">
                                    @if($errors->any('confirm_password'))
                                        <span class="text-danger">{{ $errors->first('confirm_password') }}</span>
                                    @endif
                                    <input name="confirm_password" type="password" class="form-control" autocomplete="off" required />
                                    <small class="form-text text-muted">Repetir contraseña nueva</small>
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary rounded mt-4">Cambiar contraseña</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>



    </div>

@endsection
