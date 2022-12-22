@extends('Public.Layout.app')


@section('Title',$site_name)

@section('header')


<header class="masthead">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="site-heading">
                    <h1>{{ $site_name }}</h1>
                    <span class="subheading">{{ $site_description }}</span>
                </div>
            </div>
        </div>
    </div>
</header>


@endsection




@section('postcontent')

<div class="container px-4 px-lg-5">
    <div class="row gx-4 gx-lg-5 justify-content-center">
        <div class="col-md-10 col-lg-8 col-xl-7">
            <!-- Post preview-->
            @foreach ($posts as $post)
            <div class="post-preview">
                <a href="{{ route('public.post',$post->slug) }}">
                    <h2 class="post-title">{{ $post->title }}</h2>
                    <h3 class="post-subtitle">{{ $post->description }}</h3>
                </a>
                <p class="post-meta">
                    Escrito por:
                    <a href="#!">{{ $post->author->name }}</a>
                    {{ $post->created_at->format('d-m-Y') }}
                </p>
                <p class="post-meta">
                    En: {{ $post->category->title; }}
                </p>


            </div>
            <!-- Divider-->
            <hr class="my-4" />
            @endforeach
            <!-- Pager-->
            <div class="d-flex justify-content-end mb-4"><a class="btn btn-primary text-uppercase" href="#!">Anteriores →</a></div>
        </div>
    </div>
</div>

@endsection
