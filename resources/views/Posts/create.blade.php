@extends('Layout.app')


@section('title','Nuevo Post')

@section('container')

<div class="row">
    <div class="col-12">
        <div class="form-group">
            <input autofocus autocomplete="off" class="form-control form-control-lg" name="title" value="{{ old('title') }}" placeholder="Título...">
        </div>
    </div>
    <div class="col-12">

    </div>

    <div class="col-12 mt-4">

        <textarea id="editor" name="text" rows="20"></textarea>

    </div>

</div>
@endsection

@section('scripts')
<script src="{{ URL('assets/editor/tinymce.min.js') }}" referrerpolicy="origin"></script>

<script>
    tinymce.init({
		  selector:'#editor',  theme: "silver",

		   mobile: {
    		menubar: true, plugins: 'autosave lists autolink link',
  			},

		   menubar: false, height: 900,branding: false, language: 'es',relative_urls : false,remove_script_host : false,
		  toolbar: 'undo redo | formatselect | fontsizeselect | outdent indent | numlist bullist | bold italic backcolor forecolor removeformat  | alignleft aligncenter alignright alignjustify | visualblocks |  media |  link image imagetools code preview | fullscreen responsivefilemanager',

   image_advtab: true ,
	plugins: 'link image code wordcount imagetools media lists preview quickbars  visualblocks fullscreen importcss '});

  </script>

@endsection
