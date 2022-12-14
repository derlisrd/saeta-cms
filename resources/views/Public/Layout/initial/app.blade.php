<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>@yield('Title',get_option('site_name'))</title>
        <link rel="icon" type="image/x-icon" href="{{ get_option('site_favicon') }}" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <meta name="description" content="@yield('description',get_option('site_description'))" />
        <link href="{{ public_assets('public.css') }}" rel="stylesheet">
        <link href="{{ public_assets('wp.css') }}" rel="stylesheet">
        <link rel="canonical" href="@yield('canonical',URL(''))" />
        @yield('metas')
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>
    <body>
        <!-- Navigation-->
        @include(template_path('menu'))
        <!-- Page Header-->
        @yield('header')
        <!-- Main Content-->
        @yield('postcontent')

        <!-- Footer-->
        @include(template_path('footer'))
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

        <script >
            window.addEventListener('DOMContentLoaded', () => {
            let scrollPos = 0;
            const mainNav = document.getElementById('mainNav');
            const headerHeight = mainNav.clientHeight;
            window.addEventListener('scroll', function() {
                const currentTop = document.body.getBoundingClientRect().top * -1;
                if ( currentTop < scrollPos) {
                    // Scrolling Up
                    if (currentTop > 0 && mainNav.classList.contains('is-fixed')) {
                        mainNav.classList.add('is-visible');
                    } else {

                        mainNav.classList.remove('is-visible', 'is-fixed');
                    }
                } else {
                    // Scrolling Down
                    mainNav.classList.remove(['is-visible']);
                    if (currentTop > headerHeight && !mainNav.classList.contains('is-fixed')) {
                        mainNav.classList.add('is-fixed');
                    }
                }
                scrollPos = currentTop;
            });
        })
        </script>

        @yield('scripts')


    </body>
</html>
