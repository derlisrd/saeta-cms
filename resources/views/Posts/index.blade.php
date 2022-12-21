@extends('Layout.app')


@section('title', 'Posts')

@section('container')

    <div class="row">
        <div class="col-12">
            <h1>Artículos</h1>
        </div>
        <div class="col-12">
            <a href="{{ route('posts.create') }}" class="btn btn-outline-success my-3">Agregar</a>
        </div>
        <div class="col-12">

            <table class="table table-hover">
                <thead>
                    <tr class="table-dark">
                        <th>ID</th>
                        <th scope="row">Título</th>
                        <td>Categoría</td>
                        <td>Autor</td>
                        <td>Acciones</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $p)
                    <tr>
                        <td>{{ $p->id }}</td>
                        <td>{{ $p->title }} </td>
                        <td>{{ $p->category->title }}</td>
                        <td>{{ $p->author->name }}</td>
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
                        <td>Categoría</td>
                        <td>Autor</td>
                        <td>Acciones</td>
                    </tr>
                </tfoot>
            </table>

        </div>
    </div>

@endsection
