<nav class="navbar navbar-expand-lg navbar-light" id="mainNav">
    <div class="container px-4 px-lg-5">
        <a class="navbar-brand d-flex justify-content-center align-items-center gap-2" href="{{ route('public.index') }}">
            <img width="60" src="{{ get_option('site_logo') }}" />
            {{ site_name() }}
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ms-auto py-4 py-lg-0">
                <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="{{ route('public.index') }}">Home</a></li>

                @foreach ($menu as $m )

                    <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="{{ get_post_menu_url($m->reference,$m->post_id,$m->category_id) }}"> {{ $m->title }}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
</nav>
