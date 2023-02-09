@extends('Layout.app')


@section('title', 'Posts')

@section('container')

<div class="container">


    <div class="row">
        <div class="col-12">
            <h1> {{ request()->routeIs('posts.trash') ? 'Papelera' : 'Artículos' }}</h1>
        </div>
        <div class="col-12">
            <a href="{{ route('posts.create') }}" class="btn btn-outline-success my-3">Agregar</a>
        </div>
    </div>



            <table class="table table-hover">
                <thead>
                    <tr class="table-dark">
                        <th>ID</th>
                        <th >Título</th>
                        <td>Categoría</td>
                        <td>Visitas</td>
                        <td>Tipo</td>
                        <td>Status</td>
                        <td>Autor</td>
                        <td scope="row">Acciones</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $p)
                    <tr>
                        <td>{{ $p->id }}</td>
                        <td>{{ $p->title }} </td>
                        <td>{{ $p->category->title }}</td>
                        <td>{{ $p->visits->visitas }} </td>
                        <td>{{ $p->type }} </td>
                        <td>{{ $p->status == '1' ? 'Publicado' : 'No publicado' }} </td>
                        <td>{{ $p->author->name }}</td>
                        <td>
                            <a target="_blank" href="{{ route('view.post',$p->id) }}" class="btn btn-success btn-sm">Ver</a>
                            <a href="{{ route('posts.edit',$p->id) }}" class="btn btn-info btn-sm">Editar</a>
                            <form action="{{ route('post.send_trash',$p->id) }}" class="d-inline formulario-eliminar" method="post" >
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Borrar</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr class="table-dark">
                        <th>ID</th>
                        <th >Título</th>
                        <td>Categoría</td>
                        <td>Tipo</td>
                        <td>Status</td>
                        <td>Autor</td>
                        <td scope="row">Acciones</td>
                    </tr>
                </tfoot>
            </table>

</div>

@endsection

@section('scripts')
    <script>
        @if (session('send_trash'))
            Swal.fire('Borrado!','Tu post ha sido enviado a la papelera','success')
        @endif
    </script>
    <script>
        $('.formulario-eliminar').submit(function(e){
            e.preventDefault();
            Swal.fire({
            title: 'Borrar',
            text:'Desea borrar este post?',
            showCancelButton: true,
            }).then((result) => {
            if (result.isConfirmed) {
                this.submit();
            }
            })
        });
    </script>
@endsection
