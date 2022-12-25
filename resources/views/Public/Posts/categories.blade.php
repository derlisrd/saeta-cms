@extends(template_path('app'))


@section('Title',$category->title)

@section('header')


<header class="masthead">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="site-heading">
                    <h1>{{ $category->title }}</h1>
                    <span class="subheading">{{ $category->description }}</span>
                </div>
            </div>
        </div>
    </div>
</header>


@endsection




@section('postcontent')

<div class="container">
    <div class="row g-5">
        @foreach ($posts as $post)
        <div class="col-lg-4">
            <div class="post-entry d-block small-post-entry-v">
                <div class="thumbnail">
                    @if($post->image_id)
                    <a href="{{ route('public.post',$post->slug) }}">
                        <img src="{{ $post->images->url }}" alt="Image" class="img-fluid">
                    </a>
                    @endif
                </div>
                <div class="content">
                    <div class="post-meta mb-1">
                        <a href="{{ route('public.category',$post->category->slug) }}" class="category"> {{ $post->category->title }} </a> -
                        <span class="date">{{ $post->created_at->format('d-m-Y') }}</span>
                    </div>
                    <h2 class="heading mb-3"><a href="{{ route('public.post',$post->slug) }}">{{ $post->title }}</a></h2>
                    <p>{{ $post->description }}</p>
                    <a href="{{ route('public.post',$post->slug) }}" class="post-author d-flex align-items-center">
                        <div class="author-pic">
                            {{-- <img src="images/person_1.jpg" alt="Image"> --}}
                        </div>
                        <div class="text">
                            <strong>{{ $post->author->name }}</strong>
                            <span>Editor</span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection
