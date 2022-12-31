@extends(template_path('app'))


@section('Title',get_option('site_name'))

@section('header')


<header class="masthead" style=" @if(get_option('site_cover')) background-image: url('{{ get_option('site_cover') }}') @endif">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="site-heading text-dark">
                    <h1>{{ get_option('site_name') }}</h1>
                    <span class="subheading">{{ get_option('site_description')  }}</span>
                </div>
            </div>
        </div>
    </div>
</header>


@endsection




@section('postcontent')

<div class="container mb-5">
    <div class="row gap-2">
        @foreach ($posts as $post)
        <div class="col-12 col-lg-4 mb-5">
            <div class="post-entry d-block small-post-entry-v">
                @if($post->image_id)
                <div class="thumbnail p-1 border rounded">
                    <a href="{{ route('public.post',$post->slug) }}">
                        <img src="{{ $post->images->url }}" alt="Image" class="img-fluid">
                    </a>
                </div>
                @endif
                <div class="content">
                    <div class="post-meta mb-1 text-muted">
                        <a href="{{ route('public.category',$post->category->slug) }}" class="category"> {{ $post->category->title }} </a>  —
                        <span class="date font-weight-light">{{ $post->created_at->format('d-m-Y') }}</span>
                    </div>
                    <h2 class="heading my-2"><a href="{{ route('public.post',$post->slug) }}">{{ $post->title }}</a></h2>
                    <p class="text-muted font-weight-light subheading">{{ $post->description }}</p>
                    <a href="{{ route('public.post',$post->slug) }}" class="post-author d-flex align-items-center">
                        <div class="author-pic">
                            {{-- <img src="images/person_1.jpg" alt="Image"> --}}
                        </div>
                        <div>
                            <small class="font-weight-light">Por: {{ $post->author->name }}</small>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>




@endsection
