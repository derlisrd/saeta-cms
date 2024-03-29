@extends(template_path('app'))


@section('Title',get_option('site_title'))

@section('header')


<header class="masthead" style=" @if(get_option('site_cover')) background-image: url('{{ get_option('site_cover') }}') @endif">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-12">
                <div class="site-heading text-dark">
                    <h2 >{{ get_option('site_name') }}</h2>
                    <span class="subheading">{{ get_option('site_description')  }}</span>
                </div>
            </div>
        </div>
    </div>
</header>


@endsection




@section('postcontent')

<div class="container mb-5">
    <div class="row">
        @foreach ($posts as $post)
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-5">
                <div class="post-entry d-block small-post-entry-v">
                    @if($post->image_id)
                    <div class="thumbnail p-1 border rounded">
                        <a href="{{ route('public.post',$post->slug) }}">
                            <img src="{{ $post->images->url }}" alt="{{ $post->title }}" style="object-fit: cover; max-height:190px" loading="lazy" class="w-100 object-fit-cover border rounded lazyload">
                        </a>
                    </div>
                    @endif
                    <div class="content">
                        <div class="post-meta mb-1 text-muted">
                            <a href="{{ route('public.category',$post->category->slug) }}" class="category">
                                {{ $post->category->title }}
                            </a>  —
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
        <div class="col-12">
            <div id="position_3">
                {!! $ad ?? '' !!}
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-center">
        <nav>
            <ul class="pagination">
                <li class="page-item">
                    @if ($prevPage)
                        <a class="page-link" href="{{ route('public.index.paginate', $prevPage) }}" rel="prev"
                            aria-label="« Previous">Anterior</a>
                    @endif
                </li>
                <li class="page-item">
                    @if ($nextPage)
                        <a class="page-link" href="{{ route('public.index.paginate', $nextPage) }}" rel="next"
                            aria-label="Next »">Siguiente</a>
                    @endif
                </li>
            </ul>
        </nav>
    </div>
</div>
@endsection


