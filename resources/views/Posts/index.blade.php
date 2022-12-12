@extends('Layout.app')


@section('title', 'Posts')

@section('container')

    <div class="row">
        <div class="col-12">
            <h3>Todos los artículos</h3>
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
                    <tr>
                        <td>ID</td>
                        <td>PELICULAS </td>
                        <td>pelis</td>
                        <td>derlis</td>
                        <td>
                            <a href="#" class="btn btn-info">Editar</a>
                            <a href="#" class="btn btn-danger">Borrar</a>
                        </td>
                    </tr>
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
