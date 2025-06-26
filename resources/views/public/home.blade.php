@include('public.partials.topbar')

@include('public.partials.navbar')

    <!-- Main News Slider Start -->
    <div class="container-fluid py-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="owl-carousel owl-carousel-2 carousel-item-1 position-relative mb-3 mb-lg-0">

                        @foreach ($articles as $article)

                        <div class="position-relative overflow-hidden" style="height: 435px;">
                            <div class="position-relative overflow-hidden" style="height: 435px;">
                                <a href="{{ route('public.article.show', $article->slug) }}"> {{-- Link ke halaman detail --}}
                                    <img class="img-fluid h-100" src="{{ asset($article->thumbnail) }}" style="object-fit: cover;">
                                    <div class="overlay">
                                        <div class="mb-1">
                                            <span class="text-white">{{ $article->category->name }}</span>
                                            <span class="px-2 text-white">/</span>
                                            <span class="text-white">{{ \Carbon\Carbon::parse($article->published_at)->translatedFormat('d F Y') }}</span>
                                        </div>

                                        @php
                                            $judul = $article->title;
                                            $maxWords = 12;
                                            $words = explode(' ', $judul);
                                            $judulSingkat = implode(' ', array_slice($words, 0, $maxWords)) . (count($words) > $maxWords ? '...' : '');
                                        @endphp

                                        <h2 class="m-0 text-white font-weight-bold">{{ $judulSingkat }}</h2>
                                    </div>
                                </a>
                            </div>
                        </div>
                        
                        @endforeach
                        
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="d-flex align-items-center justify-content-between bg-light py-2 px-4 mb-3">
                        <h3 class="m-0">Bahasan</h3>
                        <a class="text-secondary font-weight-medium text-decoration-none" href=""></a>
                    </div>
                    <div class="position-relative overflow-hidden mb-3" style="height: 80px;">
                        <img class="img-fluid w-100 h-100" src="{{ asset('portal-assets/img/fotokampus.jpg') }}" style="object-fit: cover;">
                        <a href="{{ url('kategori/kampus') }}" class="overlay align-items-center justify-content-center h4 m-0 text-white text-decoration-none">
                            Liputan Kampus
                        </a>
                    </div>
                    <div class="position-relative overflow-hidden mb-3" style="height: 80px;">
                        <img class="img-fluid w-100 h-100" src="{{ asset('portal-assets/img/umum.jpg') }}" style="object-fit: cover;">
                        <a href="{{ url('kategori/kegiatan') }}" class="overlay align-items-center justify-content-center h4 m-0 text-white text-decoration-none">
                            Liputan Kota
                        </a>
                    </div>
                    <div class="position-relative overflow-hidden mb-3" style="height: 80px;">
                        <img class="img-fluid w-100 h-100" src="{{ asset('portal-assets/img/kegiatan1.jpg') }}" style="object-fit: cover;">
                        <a href="{{ url('kategori/feature-news') }}" class="overlay align-items-center justify-content-center h4 m-0 text-white text-decoration-none">
                            Feature News
                        </a>
                    </div>
                    <div class="position-relative overflow-hidden" style="height: 80px;">
                        <img class="img-fluid w-100 h-100" src="{{ asset('portal-assets/img/iniopini.png') }}" style="object-fit: cover;">
                        <a href="{{ url('kategori/opini') }}" class="overlay align-items-center justify-content-center h4 m-0 text-white text-decoration-none">
                            Opini
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

                @foreach ($article4 as $article)
                    
                <div class="position-relative overflow-hidden" style="height: 300px;">
                    <img class="img-fluid w-100 h-100" src="{{ asset($article->thumbnail) }}" style="object-fit: cover;">
                    <div class="overlay">
                        <div class="mb-1" style="font-size: 13px;">
                            <a class="text-white" href="">{{ $article->category->name }}</a> 
                            <span class="px-1 text-white">/</span>
                            <a class="text-white" href="">{{ \Carbon\Carbon::parse($article->published_at)->translatedFormat('d F Y') }}</a>
                        </div>

                        @php
                            $judul = $article->title;
                            $maxWords = 5;
                            $words = explode(' ', $judul);
                            $judulSingkat = implode(' ', array_slice($words, 0, $maxWords)) . (count($words) > $maxWords ? '...' : '');
                        @endphp

                        <a class="h4 m-0 text-white" href="{{ route('public.article.show', $article->slug) }}">{{ $judulSingkat }}</a>
                    </div>
                </div>

                @endforeach

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
                        <h3 class="m-0">Kabar Kampus</h3>
                    </div>
                    <div class="owl-carousel owl-carousel-3 carousel-item-2 position-relative">
                        @foreach ($artikelKampus as $article)
                            
                        <div class="position-relative">
                            <img class="img-fluid w-100" src="{{ asset($article->thumbnail) }}" style="object-fit: cover; height: 250px;">
                            <div class="overlay position-relative bg-light">
                                <div class="mb-2" style="font-size: 13px;">
                                    <a href="">{{ $article->user->name }}</a>
                                    <span class="px-1">/</span>
                                    <span>{{ \Carbon\Carbon::parse($article->published_at)->translatedFormat('d F Y') }}</span>
                                </div>
                                @php
                                    $judul = $article->title;
                                    $maxWords = 10;
                                    $words = explode(' ', $judul);
                                    $judulSingkat = implode(' ', array_slice($words, 0, $maxWords)) . (count($words) > $maxWords ? '...' : '');
                                @endphp
                                <a class="h4" href="{{ route('public.article.show', $article->slug) }}">{{ $judulSingkat }}</a>
                                <p class="m-0">{{ \illuminate\Support\Str::limit(strip_tags($article->content), 120) }}</p>
                            </div>
                        </div>

                        @endforeach

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
                            <h3 class="m-0">Opini</h3>
                            <a class="text-secondary font-weight-medium text-decoration-none" href="{{ url('/kategori/opini') }}">View All</a>
                        </div>
                    </div>

                    @forelse ($opini as $item)
                        
                    <!-- Artikel 1 -->
                    <div class="col-lg-6">
                        <div class="position-relative mb-3">
                            <img class="img-fluid w-100" src="{{ asset($item->thumbnail) }}" style="object-fit: cover; height: 250px;">
                            <div class="overlay position-relative bg-light p-3">
                                <div class="mb-2" style="font-size: 14px;">
                                    <a href="">{{ $item->category->name }}</a>
                                    <span class="px-1">/</span>
                                    <span>{{ \Carbon\Carbon::parse($item->published_at)->translatedFormat('d F Y') }}</span>
                                </div>

                                @php
                                    $judul = $item->title;
                                    $maxWords = 10;
                                    $words = explode(' ', $judul);
                                    $judulSingkat = implode(' ', array_slice($words, 0, $maxWords)) . (count($words) > $maxWords ? '...' : '');
                                @endphp

                                <a class="h4" href="">{{ $judulSingkat }}</a>
                            </div>
                        </div>
                    </div>

                    @empty
                    <div class='col-12'>
                        <p class="text-center">Belum ada opini yang dipublikasikan.</p>
                    </div>

                    @endforelse
                    
                </div>
            </div>
        </div>
    </div>
</div>

    <!-- News With Sidebar End -->

@include('public.partials.footer')