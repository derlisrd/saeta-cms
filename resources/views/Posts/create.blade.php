@extends('Layout.app')


@section('title', 'Nuevo Post')

@section('styles')
<link rel="stylesheet" href="{{asset('vendor/laraberg/css/laraberg.css')}}">

<meta name="csrf-token" content="{{ csrf_token() }}">

@endsection


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
                <div class="col-12">
                    <div class="input-group mt-3">
                        <span class="input-group-btn">
                          <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary text-white">
                            <i class="fa fa-image"></i>Elegir
                          </a>
                        </span>
                        <input id="thumbnail" class="form-control" type="text" name="filepath">
                      </div>
                </div>

                <div class="col-12 mt-4">

                    <textarea id="editor1" placeholder="Escribe tu artículo" hidden name="text" ></textarea>

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

<script src="https://unpkg.com/react@16.8.6/umd/react.production.min.js"></script>
  <script src="https://unpkg.com/react-dom@16.8.6/umd/react-dom.production.min.js"></script>
  <script src="https://unpkg.com/moment@2.24.0/min/moment.min.js"></script>

<script src="{{ asset('vendor/laraberg/js/laraberg.js') }}"></script>

<script>
    $(function() {
                if (typeof Laraberg == 'undefined') {
                    console.warning('Laraberg not found!');
                    return;
                }
                Laraberg.init('editor1', {
                    mediaUpload: mediaUploaded,
                    minHeight: '100vh',
                    laravelFilemanager: { prefix: '/admin/filemanager' }
                });
})

const mediaUploaded = ({
           filesList,
           onFileChange
       }) => {
           setTimeout(async () => {

                var CSRF_TOKEN = document.querySelector('meta[name="csrf-token"]').getAttribute("content");
               let formD = new FormData;
               Array.from(filesList).map(file => {
                   formD.append('upload', file);
               });

               formD.append('_token',CSRF_TOKEN);

               const uploadedResponse = await $.ajax({
                   method: "POST",
                   url: `/admin/filemanager/upload`,
                   data: formD,
                   processData: false,
                   contentType: false,
                   success: function(response) {
                       console.log({
                           response
                       })
                       return response;
                   },
                   error: function(savePostErr) {
                       console.log({
                           savePostErr
                       })
                   }
               })


               const uploadedFiles = Array.from(filesList).map(file => {

                   return {
                       id: new Date().getTime(),
                       name: file.name,
                       url: uploadedResponse.url
                   }
               })

               console.log(uploadedFiles)

               onFileChange(uploadedFiles)
           }, 1000)
       }
</script>

<script>
    {!! \File::get(base_path('vendor/unisharp/laravel-filemanager/public/js/stand-alone-button.js')) !!}
  </script>
  <script>
    $('#lfm').filemanager('image', {prefix: '/admin/filemanager'});
  </script>



<script>
    function changeslug(e){
        let title = e.value.replace(/\s+/g, '-').toLowerCase();
        document.getElementById('slug').value = title.normalize("NFD").replace(/[\u0300-\u036f]/g, "");
    }
</script>
@endsection
