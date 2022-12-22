@extends('Public.Layout.app')


@section('Title',$post->title)

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
<article class="mb-4">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                {!! $post->text !!}
            </div>
        </div>
    </div>
</article>

</div>
@endsection
