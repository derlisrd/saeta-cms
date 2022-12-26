@extends(template_path('app'))


@section('Title',$post->title)

@section('metas')

{!! htmlScriptTagJsApi(['lang'=>'es']) !!}

@endsection

@section('header')




<header class="masthead" style="@if($post->image_id)background-image: url('{{ $post->images->url }}')@endif">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="post-heading">
                    <h1>{{ $post->title }}</h1>
                    <h2 class="subheading">{{ $post->description }}</h2>
                    <span class="meta">
                        Por
                        <a href="#!">{{ $post->author->name }}</a>
                        {{ $post->created_at->format('d-m-Y') }}
                    </span>
                </div>
            </div>
        </div>
    </div>
</header>


@endsection


@section('postcontent')
<article class="mb-4 article-content">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                {!! $post->text !!}
            </div>
        </div>
    </div>
</article>

    <div class="my-5 container-sm p-3 rounded border">
        <form method="post" action="#" >
            @csrf
            {{-- {!! htmlFormSnippet() !!} --}}
            <div class="row gap-3">
                <div class="col-12">
                    <h3 class="mb-4">Deja tu comentario: </h3>
                </div>
                <div class="col-12 col-md-6">
                    <input class="form-control form-control-lg mx-2" required name="name" placeholder="Nombre" />
                </div>
                <div class="col-12 col-md-6">
                    <input class="form-control form-control-lg mx-2" required name="email" placeholder="Email" />
                </div>
                <div class="col-12">
                    <label class="form-label mt-3">Comentario: </label>
                    <textarea class="form-control form-control-lg"></textarea>
                </div>
                <div class="col-12">
                    <button class="btn btn-primary rounded">Enviar</button>
                </div>
            </div>
        </form>
    </div>


@endsection
