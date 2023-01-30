@extends(template_path('app'))



@section('Title',$post->title)
@section('description',$post->description)
@section('site_cover',$post->images->url ?? '')
@section('network_site_description',$post->description)

@section('metas')

{!! htmlScriptTagJsApi(['lang'=>'es']) !!}

@endsection

@section('header')




<header class="masthead" style="@if($post->image_id)background-image: url('{{ $post->images->url }}')@endif">
    <div style="@if($post->bgcolor)background-color:('{{ $post->bgcolor }}')@endif"  >
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
                    <span class="meta">

                        <a href="{{ route('public.category',$post->category->slug) }}">{{ $post->category->title }}</a>

                    </span>
                </div>
            </div>
        </div>
    </div>
    </div>
</header>


@endsection


@section('postcontent')
<article class="mb-4 article-content">
    <div class="container px-4 px-lg-5">

        <div id="position_0">
            {!! $ad->code ?? '' !!}
        </div>

        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                {!! $post->text !!}
            </div>
        </div>
    </div>
</article>

<div class="container mb-5">
    <div class="row">
    <h2>Lea también</h2>
    @foreach ($related as $r)
            <div class="col-12 col-sm-6 col-lg-4 mb-5">
                <div class="post-entry d-block small-post-entry-v">
                    @if($r->image_id)
                    <div class="thumbnail p-1 border rounded">
                        <a href="{{ route('public.post',$r->slug) }}">
                            <img src="{{ $r->images->url }}" alt="Image" class="img-fluid">
                        </a>
                    </div>
                    @endif
                    <div class="content">
                        <h2 class="heading my-2"><a href="{{ route('public.post',$r->slug) }}">{{ $r->title }}</a></h2>
                        <a href="{{ route('public.post',$r->slug) }}" class="post-author d-flex align-items-center">
                            <div class="author-pic">
                                {{-- <img src="images/person_1.jpg" alt="Image"> --}}
                            </div>
                        </a>
                    </div>
                </div>
            </div>
    @endforeach
        </div>
</div>

    @if($post->comment_status)
        <div class="container-md mb-3 p-3">
            <h4>Comentarios: </h4>
            @foreach ($post->comments as $comment)
                @if($comment->aproved)
                <div class="border p-2 mb-2">
                    <small>{{ $comment->name }} dijo: </small>
                    <br />
                    <small>{{ $comment->comment }}</small>
                </div>
                @endif
            @endforeach
        </div>


        <div class="container-md mb-4">
            <form method="post" action="{{ route('send_comment') }}">
                <input type="hidden" value="{{ $post->id }}" name="post_id" />
                @csrf
                <div style="display: none;">
                    <label for="control">Este es un campo de control. Si lo ves, ignoralo.</label>
                    <input type="text" id="control" name="control" />
                </div>
                <div class="card mx-2 rounded-3">
                    <div class="card-body">
                        <h5 class="card-title text-muted">Deja un comentario</h5>
                            @if ($errors->any())
                                <div class="alert alert-info d-block">
                                    @foreach ($errors->all() as $error)
                                        <small>{{ $error }}</small>
                                    @endforeach
                                </div>
                            @endif
                            <div class="form-group mb-3">
                                <input name="name" class="form-control rounded @error('name') is-invalid @enderror" value="{{ old('name') }}" id="name" aria-describedby="name" placeholder="Nombre">
                            </div>
                            <div class="form-group mb-3">
                                <input class="form-control rounded @error('email') is-invalid @enderror" id="email" value="{{ old('email') }}" name="email" aria-describedby="email" placeholder="Email">
                            </div>
                            <div class="form-group mb-3">
                                <label for="comment" style="font-size: 1rem">Comentario:</label>
                                    <textarea class="form-control rounded @error('comment') is-invalid @enderror" id="comment" name="comment" rows="3"></textarea>
                            </div>
                        <button type="submit" class="btn btn-primary rounded">Comentar</button>
                    </div>
                </div>
            </form>
        </div>
    @endif

@endsection

@section('scripts')
<script>
    @if (session('comentado'))
        alert('Gracias por dejar tu comentario. En breve será moderado');
    @endif
</script>
@endsection
