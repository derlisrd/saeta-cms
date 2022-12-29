@extends('Layout.app')


@section('title', 'Comentarios')

@section('container')
<div class="container">


    <div class="row">
        <div class="col-12">
            <h1>Comentarios</h1>
        </div>
    </div>


            <table class="table table-hover">
                <thead>
                    <tr class="table-dark">
                        <th>ID</th>
                        <th scope="row">Nombre</th>
                        <td>Email</td>
                        <td>Comentarios</td>
                        <td>Post</td>
                        <td>Acciones</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($comment as $c )
                    <tr>
                        <td>{{ $c->id }}</td>
                        <td>{{ $c->name }} </td>
                        <td>{{ $c->email }}</td>
                        <td>{{ $c->comment }}</td>
                        <td>{{ $c->post->title }}</td>
                        <td>
                            @if(!$c->aproved)
                            <form action="{{ route('comment.aproved',$c->id) }}" class="d-inline formulario-aprobar" method="post" >
                                @csrf
                                <button type="submit" class="btn btn-outline-info m-1">Aprobar</a>
                            </form>
                            @endif
                            <form action="{{ route('comment.delete',$c->id) }}" class="d-inline formulario-eliminar" method="post" >
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
                        <th scope="row">Nombre</th>
                        <td>Email</td>
                        <td>Comentarios</td>
                        <td>Post</td>
                        <td>Acciones</td>
                    </tr>
                </tfoot>
            </table>


        </div>
@endsection
@section('scripts')
    <script>
        @if (session('eliminado'))
            Swal.fire('Borrado!','El comentario ha sido borrado','success')
        @endif
        @if (session('aprobado'))
            Swal.fire('Aprobado!','El comentario ha sido aprobado','success')
        @endif
    </script>
    <script>
        $('.formulario-aprobar').submit(function(e){
            e.preventDefault();
            Swal.fire({
            title: 'Aprobar',
            text:'Desea aprobar este comentario?',
            showCancelButton: true,
            }).then((result) => {
            if (result.isConfirmed) {
                this.submit();
            }
            })
        });
        $('.formulario-eliminar').submit(function(e){
            e.preventDefault();
            Swal.fire({
            title: 'Borrar',
            text:'Desea borrar este comentario?',
            showCancelButton: true,
            }).then((result) => {
            if (result.isConfirmed) {
                this.submit();
            }
            })
        });
    </script>
@endsection
