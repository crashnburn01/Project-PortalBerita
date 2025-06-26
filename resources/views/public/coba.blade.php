@include('public.partials.topbar')

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
                    <a href="index.html" class="nav-item nav-link active">Home</a>
                    <a href="category.html" class="nav-item nav-link">Artikel</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Kategori</a>
                        <div class="dropdown-menu rounded-0 m-0">
                            <a href="#" class="dropdown-item">Reportase</a>
                            <a href="#" class="dropdown-item">Opini</a>
                            <a href="#" class="dropdown-item">Feature News</a>
                        </div>
                    </div>
                    <a href="contact.html" class="nav-item nav-link">Tentang Kami</a>
                    <a href="single.html" class="nav-item nav-link">Suara Pembaca</a>
                </div>
                <div class="input-group ml-auto" style="width: auto;">
                    <div class="input-group-append">
                        <button class="input-group-text text-secondary"><i
                                class="fa fa-sign-in-alt"></i></button>
                    </div>
                </div>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->

    <!-- Main News Slider Start -->
    <div class="container-fluid py-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="owl-carousel owl-carousel-2 carousel-item-1 position-relative mb-3 mb-lg-0">
                        <div class="position-relative overflow-hidden" style="height: 435px;">
                            <div class="position-relative overflow-hidden" style="height: 435px;">
                                <a href="{{ url('/article/contoh-artikel') }}"> {{-- Link ke halaman detail --}}
                                    <img class="img-fluid h-100" src="{{ asset('portal-assets/img/contoh1.jpeg') }}" style="object-fit: cover;">
                                    <div class="overlay">
                                        <div class="mb-1">
                                            <span class="text-white">Reportase</span>
                                            <span class="px-2 text-white">/</span>
                                            <span class="text-white">Mei 20, 2025</span>
                                        </div>
                                        <h2 class="m-0 text-white font-weight-bold">20 Unit Komputer Per Semester: Apakah Laboratorium Universitas Dipa Makassar Sudah Memadai?</h2>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="position-relative overflow-hidden" style="height: 435px;">
                            <img class="img-fluid h-100" src="{{ asset('portal-assets/img/news-700x435-2.jpg') }}" style="object-fit: cover;">
                            <div class="overlay">
                                <div class="mb-1">
                                    <a class="text-white" href="">Technology</a>
                                    <span class="px-2 text-white">/</span>
                                    <a class="text-white" href="">January 01, 2045</a>
                                </div>
                                <a class="h2 m-0 text-white font-weight-bold" href="">Sanctus amet sed amet ipsum lorem. Dolores et erat et elitr sea sed</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="d-flex align-items-center justify-content-between bg-light py-2 px-4 mb-3">
                        <h3 class="m-0">Bahasan</h3>
                        <a class="text-secondary font-weight-medium text-decoration-none" href=""></a>
                    </div>
                    <div class="position-relative overflow-hidden mb-3" style="height: 80px;">
                        <img class="img-fluid w-100 h-100" src="{{ asset('portal-assets/img/fotokampus.jpg') }}" style="object-fit: cover;">
                        <a href="" class="overlay align-items-center justify-content-center h4 m-0 text-white text-decoration-none">
                            Liputan Kampus
                        </a>
                    </div>
                    <div class="position-relative overflow-hidden mb-3" style="height: 80px;">
                        <img class="img-fluid w-100 h-100" src="{{ asset('portal-assets/img/teknologia.jpeg') }}" style="object-fit: cover;">
                        <a href="" class="overlay align-items-center justify-content-center h4 m-0 text-white text-decoration-none">
                            Teknologi
                        </a>
                    </div>
                    <div class="position-relative overflow-hidden mb-3" style="height: 80px;">
                        <img class="img-fluid w-100 h-100" src="{{ asset('portal-assets/img/kegiatan1.jpg') }}" style="object-fit: cover;">
                        <a href="" class="overlay align-items-center justify-content-center h4 m-0 text-white text-decoration-none">
                            Liputan Khusus
                        </a>
                    </div>
                    <div class="position-relative overflow-hidden" style="height: 80px;">
                        <img class="img-fluid w-100 h-100" src="{{ asset('portal-assets/img/umum.jpg') }}" style="object-fit: cover;">
                        <a href="" class="overlay align-items-center justify-content-center h4 m-0 text-white text-decoration-none">
                            Liputan Kota
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Main News Slider End -->


    <!-- Featured News Slider Start -->
    <div class="container-fluid py-3">
        <div class="container">
            <div class="d-flex align-items-center justify-content-between bg-light py-2 px-4 mb-3">
                <h3 class="m-0">Terkini</h3>
                <a class="text-secondary font-weight-medium text-decoration-none" href="">View All</a>
            </div>

            <div class="owl-carousel owl-carousel-2 carousel-item-3 position-relative">
                <div class="position-relative overflow-hidden" style="height: 300px;">
                    <img class="img-fluid w-100 h-100" src="{{ asset('portal-assets/img/contoh1.jpeg') }}" style="object-fit: cover;">
                    <div class="overlay">
                        <div class="mb-1" style="font-size: 13px;">
                            <a class="text-white" href="">Reportase</a>
                            <span class="px-1 text-white">/</span>
                            <a class="text-white" href="">Mei 20, 2025</a>
                        </div>

                        @php
                            $judul = "20 Unit Komputer Per Semester: Apakah Laboratorium Universitas Dipa Makassar Sudah Memadai?";
                            $maxWords = 5;
                            $words = explode(' ', $judul);
                            $judulSingkat = implode(' ', array_slice($words, 0, $maxWords)) . (count($words) > $maxWords ? '...' : '');
                        @endphp

                        <a class="h4 m-0 text-white" href="{{ url('/article/contoh-artikel') }}">{{ $judulSingkat }}</a>
                    </div>
                </div>

                <div class="position-relative overflow-hidden" style="height: 300px;">
                    <img class="img-fluid w-100 h-100" src="img/news-300x300-2.jpg" style="object-fit: cover;">
                    <div class="overlay">
                        <div class="mb-1" style="font-size: 13px;">
                            <a class="text-white" href="">Technology</a>
                            <span class="px-1 text-white">/</span>
                            <a class="text-white" href="">January 01, 2045</a>
                        </div>
                        <a class="h4 m-0 text-white" href="">Sanctus amet sed ipsum lorem</a>
                    </div>
                </div>
                <div class="position-relative overflow-hidden" style="height: 300px;">
                    <img class="img-fluid w-100 h-100" src="img/news-300x300-3.jpg" style="object-fit: cover;">
                    <div class="overlay">
                        <div class="mb-1" style="font-size: 13px;">
                            <a class="text-white" href="">Technology</a>
                            <span class="px-1 text-white">/</span>
                            <a class="text-white" href="">January 01, 2045</a>
                        </div>
                        <a class="h4 m-0 text-white" href="">Sanctus amet sed ipsum lorem</a>
                    </div>
                </div>
                <div class="position-relative overflow-hidden" style="height: 300px;">
                    <img class="img-fluid w-100 h-100" src="img/news-300x300-4.jpg" style="object-fit: cover;">
                    <div class="overlay">
                        <div class="mb-1" style="font-size: 13px;">
                            <a class="text-white" href="">Technology</a>
                            <span class="px-1 text-white">/</span>
                            <a class="text-white" href="">January 01, 2045</a>
                        </div>
                        <a class="h4 m-0 text-white" href="">Sanctus amet sed ipsum lorem</a>
                    </div>
                </div>
                <div class="position-relative overflow-hidden" style="height: 300px;">
                    <img class="img-fluid w-100 h-100" src="img/news-300x300-5.jpg" style="object-fit: cover;">
                    <div class="overlay">
                        <div class="mb-1" style="font-size: 13px;">
                            <a class="text-white" href="">Technology</a>
                            <span class="px-1 text-white">/</span>
                            <a class="text-white" href="">January 01, 2045</a>
                        </div>
                        <a class="h4 m-0 text-white" href="">Sanctus amet sed ipsum lorem</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- Featured News Slider End -->


    <!-- Category News Slider Start -->
    <div class="container-fluid py-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 py-3">
                    <div class="bg-light py-2 px-4 mb-3">
                        <h3 class="m-0">Opini</h3>
                    </div>
                    <div class="owl-carousel owl-carousel-3 carousel-item-2 position-relative">
                        <div class="position-relative">
                            <img class="img-fluid w-100" src="{{ asset('portal-assets/img/news-500x280-1.jpg') }}" style="object-fit: cover;">
                            <div class="overlay position-relative bg-light">
                                <div class="mb-2" style="font-size: 13px;">
                                    <a href="">Technology</a>
                                    <span class="px-1">/</span>
                                    <span>January 01, 2045</span>
                                </div>
                                <a class="h4 m-0" href="">Sanctus amet sed ipsum lorem</a>
                            </div>
                        </div>
                        <div class="position-relative">
                            <img class="img-fluid w-100" src="{{ asset('portal-assets/img/news-500x280-2.jpg') }}" style="object-fit: cover;">
                            <div class="overlay position-relative bg-light">
                                <div class="mb-2" style="font-size: 13px;">
                                    <a href="">Technology</a>
                                    <span class="px-1">/</span>
                                    <span>January 01, 2045</span>
                                </div>
                                <a class="h4 m-0" href="">Sanctus amet sed ipsum lorem</a>
                            </div>
                        </div>
                        <div class="position-relative">
                            <img class="img-fluid w-100" src="img/news-500x280-3.jpg" style="object-fit: cover;">
                            <div class="overlay position-relative bg-light">
                                <div class="mb-2" style="font-size: 13px;">
                                    <a href="">Technology</a>
                                    <span class="px-1">/</span>
                                    <span>January 01, 2045</span>
                                </div>
                                <a class="h4 m-0" href="">Sanctus amet sed ipsum lorem</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- Category News Slider End -->

    <!-- News With Sidebar Start -->
    <div class="container-fluid py-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">                    
                <div class="row">
                    <div class="col-12">
                        <div class="d-flex align-items-center justify-content-between bg-light py-2 px-4 mb-3">
                            <h3 class="m-0">Reportase</h3>
                            <a class="text-secondary font-weight-medium text-decoration-none" href="">View All</a>
                        </div>
                    </div>

                    <!-- Artikel 1 -->
                    <div class="col-lg-6">
                        <div class="position-relative mb-3">
                            <img class="img-fluid w-100" src="{{ asset('portal-assets/img/contoh1.jpeg') }}" style="object-fit: cover; height: 250px;">
                            <div class="overlay position-relative bg-light p-3">
                                <div class="mb-2" style="font-size: 14px;">
                                    <a href="">Technology</a>
                                    <span class="px-1">/</span>
                                    <span>January 01, 2045</span>
                                </div>
                                <a class="h4" href="">Est stet amet ipsum stet clita rebum duo</a>
                                <p class="m-0">Rebum dolore duo et vero ipsum clita, est ea sed duo diam ipsum...</p>
                            </div>
                        </div>
                    </div>

                    <!-- Artikel 2 -->
                    <div class="col-lg-6">
                        <div class="position-relative mb-3">
                            <img class="img-fluid w-100" src="{{ asset('portal-assets/img/news-500x280-6.jpg') }}" style="object-fit: cover; height: 250px;">
                            <div class="overlay position-relative bg-light p-3">
                                <div class="mb-2" style="font-size: 14px;">
                                    <a href="">Technology</a>
                                    <span class="px-1">/</span>
                                    <span>January 01, 2045</span>
                                </div>
                                <a class="h4" href="">Est stet amet ipsum stet clita rebum duo</a>
                                <p class="m-0">Rebum dolore duo et vero ipsum clita, est ea sed duo diam ipsum...</p>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>

    <!-- News With Sidebar End -->

@include('public.partials.footer')