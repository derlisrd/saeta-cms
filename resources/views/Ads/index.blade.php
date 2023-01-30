@extends('Layout.app')


@section('title','Ads')

@section('container')

<div class="container">
    <h2>Ads</h2>
    <a href="{{ route('ads.create') }}" class="btn btn-primary my-4">Crear nuevo</a>

<div class="row">
    <div class="col-12">
        <table class="table table-hover">
            <thead>
                <tr class="table-dark">
                    <th>ID</th>
                    <th scope="row">Nombre</th>
                    <td>Posición</td>
                    <td>Dimensiones</td>
                    <td>Plataforma</td>
                    <td>Acciones</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($ads as $c )
                <tr>
                    <td>{{ $c->id }}</td>
                    <td>{{ $c->name }} </td>
                    <td>{{ $c->position }}</td>
                    <td>{{ $c->width . 'x' .$c->height }}</td>
                    <td>@if($c->movil) Movil @else Escritorio @endif </td>
                    <td>
                        <a href="{{ route('ads.edit',$c->id) }}" class="btn btn-outline-info">Editar</a>
                        <form action="{{ route('ads.delete',$c->id) }}" class="d-inline formulario-eliminar" method="post" >
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger">Borrar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</div>

@endsection

@section('scripts')
    <script>
        @if (session('send_trash'))
            Swal.fire('Borrado!','Ha sido borrado con exito.','success')
        @endif
    </script>
    <script>
        $('.formulario-eliminar').submit(function(e){
            e.preventDefault();
            Swal.fire({
            title: 'Borrar',
            text:'Desea borrar este ad?',
            showCancelButton: true,
            }).then((result) => {
            if (result.isConfirmed) {
                this.submit();
            }
            })
        });
    </script>
@endsection

