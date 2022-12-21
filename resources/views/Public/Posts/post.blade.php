@extends('Public.Layout.app')


@section('Title',$post->title)

@section('header')


<header class="masthead" style="{{ $post->media->url ?? '' }}">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="site-heading">
                    <h1>{{ $post->title }}</h1>
                    <span class="subheading">{{ $post->description }}</span>
                </div>
            </div>
        </div>
    </div>
</header>


@endsection


@section('postcontent')
<div class="container">
    {!! $post->text !!}
</div>
@endsection
