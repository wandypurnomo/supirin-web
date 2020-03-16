<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="index.html">{{ $config['title'] }}</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
                aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item {{ Request::routeIs('home') ? 'active':'' }}"><a href="{{ route('home') }}"
                                                                                     class="nav-link">Beranda</a></li>
                <li class="nav-item {{ Request::routeIs('about') ? 'active':'' }}"><a href="{{ route('about') }}"
                                                                                      class="nav-link">Tentang</a></li>
                <li class="nav-item {{ Request::routeIs('driver') ? 'active':'' }}"><a href="{{ route('driver') }}"
                                                                                       class="nav-link">Supir</a></li>
{{--                <li class="nav-item"><a href="services.html" class="nav-link">Login</a></li>--}}

                <li class="nav-item {{ Request::routeIs('driver.register') ? 'active':'' }}"><a href="{{ route('driver.register') }}" class="nav-link">Daftar</a></li>
                <li class="nav-item {{ Request::routeIs('contact') ? 'active':'' }}" ><a href="{{ route('contact') }}" class="nav-link">Kontak</a></li>
            </ul>
        </div>
    </div>
</nav>
<!-- END nav -->
