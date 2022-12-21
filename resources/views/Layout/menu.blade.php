@yield('menu-nav')
<div class="dashboard-nav">
    <header>
        <a href="{{ route('home') }}" class="menu-toggle">
            <i class="fas fa-bars"></i></a>
            <a href="{{ route('home') }}" class="brand-logo">
                <i class="fa fa-rocket"></i> <span> {{ env('APP_NAME') }}</span>
            </a>
    </header>



    <nav class="dashboard-nav-list">

        <a href="{{ route('home') }}" class="dashboard-nav-item {{ request()->routeIs('home*') ? 'active' : '' }}">
            <i class="fas fa-home"></i>Home
        </a>


        <a href="{{ route('filemanager.view') }}" class="dashboard-nav-item"><i class="fas fa-file-upload"></i> Media </a>


        <div class='dashboard-nav-dropdown {{ request()->routeIs('posts*') ? 'show' : '' }}'>
            <a href="#!" class="dashboard-nav-item dashboard-nav-dropdown-toggle"><i class="fas fa-newspaper"></i> Posts </a>

            <div class='dashboard-nav-dropdown-menu'>
                <a href="{{ route('posts.create') }}" class="dashboard-nav-dropdown-item {{ request()->routeIs('posts.create') ? 'active' : '' }}">
                    <i class="fas fa-plus mx-1"></i> Nuevo
                </a>
                <a href="{{ route('posts') }}" class="dashboard-nav-dropdown-item {{ request()->routeIs('posts') ? 'active' : '' }}">
                    <i class="fas fa-newspaper mx-1"></i> Articulos
                </a>
                <a href="{{ route('posts.category') }}" class="dashboard-nav-dropdown-item {{ request()->routeIs('posts.category') ? 'active' : '' }}">
                    <i class="fas fa-marker mx-1"></i>Categorías
                </a>
            </div>
        </div>


        <div class='dashboard-nav-dropdown'><a href="#!"
                class="dashboard-nav-item dashboard-nav-dropdown-toggle"><i class="fas fa-users"></i> Usuarios </a>
            <div class='dashboard-nav-dropdown-menu'>
                <a href="#" class="dashboard-nav-dropdown-item">Todos</a>
                <a href="#" class="dashboard-nav-dropdown-item">Suscritos</a>
            </div>
        </div>

        <a href="{{ route('menu') }}" class="dashboard-nav-item {{ request()->routeIs('menu*') ? 'active' : '' }}"><i class="fa fa-traffic-light"></i> Menu </a>
        <a href="{{ route('config') }}" class="dashboard-nav-item {{ request()->routeIs('config*') ? 'active' : '' }}"><i class="fas fa-cogs"></i> Config. </a>
        <a href="{{ route('profile') }}" class="dashboard-nav-item {{ request()->routeIs('profile*') ? 'active' : '' }}"><i class="fas fa-user"></i> Perfil </a>

        <div class="nav-item-divider"></div>
        <a href="{{ route('logout') }}" class="dashboard-nav-item"><i class="fas fa-sign-out-alt"></i> Logout </a>
    </nav>
</div>
