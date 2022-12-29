@yield('menu-nav')
<div class="dashboard-nav">
    <header>
        <a href="#" class="menu-toggle"><i class="fas fa-bars"></i></a>
        <a href="#" class="brand-logo">
            <i class="fa fa-rocket"></i> <small class="text-muted"> {{ site_name()}}</small>
        </a>
    </header>



    <nav class="dashboard-nav-list">

        <a href="{{ route('home') }}" class="dashboard-nav-item {{ request()->routeIs('home*') ? 'active' : '' }}">
            <i class="fas fa-home"></i>Home
        </a>


        <a href="{{ route('filemanager.view') }}" class="dashboard-nav-item {{ request()->routeIs('filemanager*') ? 'active' : '' }}"><i class="fas fa-file-upload"></i> Media </a>


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
                <a href="{{ route('posts.comments') }}" class="dashboard-nav-dropdown-item {{ request()->routeIs('posts.comments') ? 'active' : '' }}">
                    <i class="fas fa-comment mx-1"></i>Comentarios
                </a>
                <a href="{{ route('posts.trash') }}" class="dashboard-nav-dropdown-item {{ request()->routeIs('posts.trash') ? 'active' : '' }}">
                    <i class="fas fa-trash mx-1"></i>Papelera
                </a>
            </div>
        </div>


        <div class='dashboard-nav-dropdown {{ request()->routeIs('users*') ? 'show' : '' }}'>
            <a href="#!" class="dashboard-nav-item dashboard-nav-dropdown-toggle"><i class="fas fa-users"></i> Usuarios </a>
            <div class='dashboard-nav-dropdown-menu'>
                <a href="{{ route('users') }}" class="dashboard-nav-dropdown-item {{ request()->routeIs('users') ? 'active' : '' }}">Todos</a>
                <a href="{{ route('users.create') }}" class="dashboard-nav-dropdown-item {{ request()->routeIs('users.create') ? 'active' : '' }}">Nuevo</a>
            </div>
        </div>

        <a href="{{ route('menu') }}" class="dashboard-nav-item {{ request()->routeIs('menu*') ? 'active' : '' }}"><i class="fa fa-traffic-light"></i> Menu </a>
        <a href="{{ route('config') }}" class="dashboard-nav-item {{ request()->routeIs('config*') ? 'active' : '' }}"><i class="fas fa-cogs"></i> Config. </a>
        <a href="{{ route('profile') }}" class="dashboard-nav-item {{ request()->routeIs('profile*') ? 'active' : '' }}"><i class="fas fa-user"></i> Perfil </a>

        <div class="nav-item-divider"></div>
        <a href="{{ route('public.index') }}" class="dashboard-nav-item"><i class="fas fa-eye"></i> Ver página </a>

        <a href="{{ route('logout') }}" class="dashboard-nav-item"><i class="fas fa-sign-out-alt"></i> Logout </a>
    </nav>
</div>
