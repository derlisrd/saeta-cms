@extends('Layout.app')


@section('title', 'Usuarios')

@section('container')
<div class="container">


<div class="row">
    <div class="col-12">
        <h1>Usuarios</h1>
    </div>
    <div class="col-12">
        <a href="{{ route('users.create') }}" class="btn btn-outline-success my-3">Agregar</a>
    </div>
</div>



    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr class="table-dark">
                    <th>ID</th>
                    <th scope="row">Nombre</th>
                    <th>Username</th>
                    <th>Email</th>
                    <td>Acciones</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $u)
                <tr>
                    <td>{{ $u->id }}</td>
                    <td>{{ $u->name }} </td>
                    <td>{{ $u->username }} </td>
                    <td>{{ $u->email }} </td>
                    <td>
                        <a href="#" class="btn btn-outline-info">Editar</a>
                        <a href="#" class="btn btn-outline-danger">Borrar</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr class="table-dark">
                    <th>ID</th>
                    <th scope="row">Nombre</th>
                    <th>Username</th>
                    <th>Email</th>
                    <td>Acciones</td>
                </tr>
            </tfoot>
        </table>
    </div>

</div>
@endsection

@section('scripts')
<script>
    @if (session('added'))
        Swal.fire('Agregado!','Usuario agregado con éxito','success')
    @endif
</script>
@endsection
