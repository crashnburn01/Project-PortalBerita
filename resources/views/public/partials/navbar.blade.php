    <!-- Navbar Start -->
    <div class="container-fluid p-0 mb-3 sticky-top" style="z-index: 1030;">
        <nav class="navbar navbar-expand-lg bg-light navbar-light py-2 py-lg-0 px-lg-5">
            <a href="" class="navbar-brand d-block d-lg-none">
                <h1 class="m-0 display-5 text-uppercase"><span class="text-primary">FORMAT</span>NEWS</h1>
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between px-0 px-lg-3" id="navbarCollapse">
                <div class="navbar-nav mr-auto py-0">
                    <a href="{{ url('/') }}" class="nav-item nav-link {{ request()->is('/') ? 'active' : '' }}">Home</a>
                    <a href="{{ url('/artikel') }}" class="nav-item nav-link {{ request()->is('artikel') ? 'active' : '' }}">Berita</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle {{ request()->is('kategori/*') ? 'active' : '' }}" data-toggle="dropdown">Bahasan</a>
                        <div class="dropdown-menu rounded-0 m-0">
                            <a href="{{ url('/kategori/kampus') }}" class="dropdown-item">Liputan Kampus</a>
                            <a href="{{ url('/kategori/kegiatan') }}" class="dropdown-item">Liputan Kota</a>
                            <a href="{{ url('/kategori/feature-news') }}" class="dropdown-item">Feature News</a>
                            <a href="{{ url('/kategori/opini') }}" class="dropdown-item">Opini</a>
                        </div>
                    </div>
                    <a href="{{ url('/about') }}" class="nav-item nav-link {{ request()->is('about') ? 'active' : '' }}">Tentang Kami</a>
                    <a href="{{ url('/suarapembaca') }}" class="nav-item nav-link {{ request()->is('suarapembaca') ? 'active' : '' }}">Suara Pembaca</a>
                </div>
                <div class="input-group ml-auto" style="width: auto;">
                    <div class="input-group-append">
                        <a href="{{ url('/admin/login') }}" class="input-group-text text-secondary">
                            <i class="fa fa-sign-in-alt"></i>
                        </a>
                    </div>
                </div>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->