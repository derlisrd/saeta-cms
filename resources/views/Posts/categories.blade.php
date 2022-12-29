@extends('Layout.app')


@section('title', 'Categorías')

@section('container')
<div class="container">


    <div class="row">
        <div class="col-12">
            <h1>Categorías</h1>
        </div>
        <div class="col-12">
            <a href="{{ route('posts.category.create') }}" class="btn btn-outline-success my-3">Agregar</a>
        </div>
    </div>


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
                            <a href="{{ route('posts.category.edit',$c->id) }}" class="btn btn-outline-info">Editar</a>
                            <form action="{{ route('category.delete',$c->id) }}" class="d-inline formulario-eliminar" method="post" >
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger">Borrar</button>
                            </form>
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
@endsection
@section('scripts')
    <script>
        @if (session('eliminado'))
            Swal.fire('Borrado!','Tristin tu categoría ya se chingó a la chingadera. chau','success')
        @endif

    </script>
    <script>
        $('.formulario-eliminar').submit(function(e){
            e.preventDefault();
            Swal.fire({
            title: 'Borrar',
            text:'Desea borrar esta categoría?',
            showCancelButton: true,
            }).then((result) => {
            if (result.isConfirmed) {
                this.submit();
            }
            })
        });
    </script>
@endsection
