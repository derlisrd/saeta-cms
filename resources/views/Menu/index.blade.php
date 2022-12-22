@extends('Layout.app')


@section('title', 'Menu')

@section('container')
<div class="row">
    <div class="col-12">
        <h1>Menú</h1>
    </div>
    <div class="col-12">
        <a href="{{ route('menu.create') }}" class="btn btn-outline-success my-3">Agregar</a>
    </div>
    <div class="col-12">

        <table class="table table-hover">
            <thead>
                <tr class="table-dark">
                    <th>ID</th>
                    <th scope="row">Título</th>
                    <th>Referencia</th>
                    <td>Acciones</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($menus as $p)
                <tr>
                    <td>{{ $p->id }}</td>
                    <td>{{ $p->title }} </td>
                    <td>{{ $p->reference }} </td>
                    <td>
                        <a href="#" class="btn btn-outline-info">Editar</a>
                        <form action="{{ route('menu.delete',$p->id) }}" class="d-inline formulario-eliminar" method="post" >
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
                    <th>Referencia</th>
                    <td>Acciones</td>
                </tr>
            </tfoot>
        </table>

    </div>
</div>

@endsection
@section('scripts')

<script>
    @if (session('eliminado'))
        Swal.fire('Borrado!','El menú ha sido borrado que triste :(','success')
    @endif
</script>

<script>
    $('.formulario-eliminar').submit(function(e){
        e.preventDefault();
        Swal.fire({
        title: 'Borrar',
        text:'Desea borrar ese menú?',
        showCancelButton: true,
        }).then((result) => {
        if (result.isConfirmed) {
            this.submit();
        }
        })
    });
</script>

@endsection
