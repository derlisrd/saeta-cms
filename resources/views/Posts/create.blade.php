@extends('Layout.app')


@section('title', 'Nuevo Post')

@section('container')

    <form action="{{ route('posts.store') }}" method="post">
        @csrf
        <div class="container">

            <div class="row">
                <div class="col-12 col-md-8">
                    <div class="form-group">
                        <input required onkeyup="changeslug(this)" autofocus autocomplete="off" class="form-control form-control-lg" name="title"
                            value="{{ old('title') }}" placeholder="Título...">
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <button type="submit" class="btn btn-success my-3">Publicar</button>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal1">
                        Config
                    </button>
                </div>


                <div class="col-12 mt-4">

                    <textarea id="editor" name="text" rows="20"></textarea>

                </div>

            </div>
        </div>


        <div class="modal" id="modal1">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Configuraciones</h5>
                        <button type="button" class="btn close" data-dismiss="modal" aria-label="Close">
                            X
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <textarea class="form-control" name="description"></textarea>
                            <small id="slugHelp" class="form-text text-muted">Descripción</small>
                        </div>
                        <div class="form-group">
                            <input  id="slug" class="form-control mt-2" name="slug" value="{{ old('slug') }}" placeholder="Slug..." />
                            <small id="slugHelp" class="form-text text-muted">alias para el ceo</small>
                        </div>
                        <div class="form-group">
                            <label for="category_id" class="form-label font-weight-bold mt-1">Categoría: </label>
                            <select class="form-select" name="category_id">
                                @foreach ($categories as $c)
                                    <option value="{{ $c->id }}">{{ $c->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mt-2">
                            <label for="tags" class="form-label font-weight-bold mt-2">Tags: </label>
                            <input  id="tags" class="form-control" name="tags" value="{{ old('tags') }}" placeholder="Noticias, fotografías,..." />
                            <small id="slugHelp" class="form-text text-muted">Tags deben ir entre comas</small>
                        </div>

                        <div class="form-group">
                            <label for="type" class="form-label font-weight-bold mt-2">Tipo: </label>
                            <select class="form-select" name="type">
                                <option value="post">Artículo</option>
                                <option value="page">Página</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="exampleSelect1" class="form-label font-weight-bold mt-2">Estado: </label>
                            <select class="form-select" name="status">
                                <option value="1">Publicado</option>
                                <option value="2">Privado</option>
                                <option value="3">Oculto</option>
                                <option value="4">Contraseña</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleSelect1" class="form-label font-weight-bold mt-2">Comentarios: </label>
                            <select class="form-select" name="comment_status">
                                <option value="1">Permitido</option>
                                <option value="0">Cerrado</option>
                            </select>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>



    </form>




@endsection

@section('scripts')
    <script src="{{ URL('assets/editor/tinymce.min.js') }}" referrerpolicy="origin"></script>

    <script>
        tinymce.init({
            selector: '#editor',
            theme: "silver",

            mobile: {
                menubar: true,
                plugins: 'autosave lists autolink link',
            },

            menubar: false,
            height: '80vh',
            branding: false,
            language: 'es',
            relative_urls: false,
            remove_script_host: false,
            toolbar: 'undo redo | formatselect | fontsizeselect | outdent indent | numlist bullist | bold italic backcolor forecolor removeformat  | alignleft aligncenter alignright alignjustify | visualblocks |  media |  link image imagetools code preview | fullscreen responsivefilemanager',

            image_advtab: true,
            plugins: 'link image code wordcount imagetools media lists preview quickbars  visualblocks fullscreen importcss '
        });
    </script>
    <script>
        function changeslug(e){
            let title = e.value.replace(/\s+/g, '-').toLowerCase();
            document.getElementById('slug').value = title
        }
    </script>
@endsection
