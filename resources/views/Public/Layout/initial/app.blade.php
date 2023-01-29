<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="author" content="" />
        <title>@yield('Title',get_option('site_name'))</title>
        <link rel="icon" type="image/x-icon" href="{{ get_option('site_favicon') }}" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->

        <meta name="description" content="@yield('description',get_option('site_description'))" />



<meta property="og:locale" content="es_ES"/>
<meta property="og:title" content="@yield('site_title',get_option('site_name'))"/>
<meta property="og:url" content="{{ request()->url() }}"/>
<meta property="og:image" content="@yield('site_cover',get_option('site_cover'))"/>
 <meta property="og:type"   content="website" />
<meta property="og:site_name" content="{{ get_option('site_name') }}"/>
<meta property="og:description" content="@yield('network_site_description',get_option('site_description'))"/>



        <link href="{{ public_assets('public.css') }}" rel="stylesheet">
        <link href="{{ public_assets('wp.css') }}" rel="stylesheet">
        <link rel="canonical" href="@yield('canonical',URL(''))" />
        @yield('metas')
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-BY3KR284N5"></script>
        <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-BY3KR284N5');
        </script>
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


        <script type="text/javascript">
            atOptions = {
                'key' : 'db44f994c832abe1de88ca5d4c8662d5',
                'format' : 'iframe',
                'height' : 250,
                'width' : 300,
                'params' : {}
            };
            document.write('<scr' + 'ipt type="text/javascript" src="http' + (location.protocol === 'https:' ? 's' : '') + '://www.effectivecreativeformat.com/db44f994c832abe1de88ca5d4c8662d5/invoke.js"></scr' + 'ipt>');
        </script>


    </body>
</html>
