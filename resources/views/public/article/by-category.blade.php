@include('public.partials.topbar')

@include('public.partials.navbar')


    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="container">
            <nav class="breadcrumb bg-transparent m-0 p-0">
                <a class="breadcrumb-item" href="/">Home</a>
                <span class="breadcrumb-item active">{{ $category->name }}</span>
            </nav>
        </div>
    </div>
    <!-- Breadcrumb End -->


    <!-- News With Sidebar Start -->
    <div class="container-fluid py-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-12">
                            <div class="d-flex align-items-center justify-content-between bg-light py-2 px-4 mb-3">
                                <h3 class="m-0">{{ $category->name }}</h3>
                                <a class="text-secondary font-weight-medium text-decoration-none" href=""></a>
                            </div>
                        </div>

                        @forelse ( $articles as $article )
                            
                        <div class="col-lg-6">
                            <div class="position-relative mb-3">
                                <img class="img-fluid w-100" src="{{ asset($article->thumbnail) }}" style="height: 280px; object-fit: cover; border-radius: 5px;">
                                <div class="overlay position-relative bg-light">
                                    <div class="mb-2" style="font-size: 14px;">
                                        <a href="">{{ $article->category->name }}</a>
                                        <span class="px-1">/</span>
                                        <span>{{ \Carbon\Carbon::parse($article->published_at)->translatedFormat('d F Y') }}</span>
                                    </div>

                                    @php
                                        $ringkas = $article->title;
                                        $maxWords = 15;
                                        $words = explode(' ', $ringkas);
                                        $ringkas = implode(' ', array_slice($words, 0, $maxWords)) . (count($words) > $maxWords ? '...' : '');
                                    @endphp
                                    <a class="h4" href="{{ route('public.article.show', $article->slug) }}">{{ $ringkas }}</a>
                                    <p class="m-0">{{ \illuminate\Support\Str::limit(strip_tags($article->content), 120) }}</p>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="col-12">
                            <p class="text-center">Belum ada berita untuk kategori ini.</p>
                        </div>
                            
                        @endforelse

                    </div>
                    
                    {{-- Iklan disini atau kalau mau buat open recruitmen bisa pasang disini --}}
                    <div class="mb-3">
                        <a href=""><img class="img-fluid w-100" src="{{ asset('portal-assets/img/vibes.png') }}" alt=""></a>
                    </div>
                    
                    <div class="row">
                        <div class="col-12 d-flex justify-content-center" >
                            {{ $articles->links('vendor.pagination.bootstrap-4') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- News With Sidebar End -->


@include('public.partials.footer')