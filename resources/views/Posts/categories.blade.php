@extends('Layout.app')


@section('title', 'Categorías')

@section('container')

    <div class="row">
        <div class="col-12 col-md-8">
            <h4>Categorías</h4>
        </div>
        <div class="col-12 col-md-4">
            <a href="{{ route('posts.create') }}" class="btn btn-outline-success my-3">Agregar</a>
        </div>
        <div class="col-12">

            <table class="table table-hover">
                <thead>
                    <tr class="table-dark">
                        <th>ID</th>
                        <th scope="row">Título</th>
                        <td>Slug</td>
                        <td>Descripción</td>
                        <td>Acciones</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $c )
                    <tr>
                        <td>{{ $c->id }}</td>
                        <td>{{ $c->title }} </td>
                        <td>{{ $c->slug }}</td>
                        <td>{{ $c->description }}</td>
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
                        <th scope="row">Título</th>
                        <td>Slug</td>
                        <td>Descripción</td>
                        <td>Acciones</td>
                    </tr>
                </tfoot>
            </table>

        </div>
    </div>

@endsection
