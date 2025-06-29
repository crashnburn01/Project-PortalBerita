@include('public.partials.topbar')

@include('public.partials.navbar')


    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="container">
            <nav class="breadcrumb bg-transparent m-0 p-0">
                <a class="breadcrumb-item" href="{{ url('/') }}">Home</a>
                <a class="breadcrumb-item" href="#">{{ $article->category->name }}</a>
                <span class="breadcrumb-item active">{{ $article->title }}</span>
            </nav>
        </div>
    </div>
    <!-- Breadcrumb End -->


    <!-- News With Sidebar Start -->
    <div class="container-fluid py-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <!-- News Detail Start -->    
                    <div class="position-relative mb-3">
                        <img src="{{ asset($article->thumbnail) }}" 
                             style="width: 100%; height: 435px; object-fit: cover; object-position: center;" 
                             alt="Gambar Artikel">
                        <div class="overlay position-relative bg-light">
                            <div class="mb-3">
                                <a href="">{{ $article->category->name }}</a>
                                <span class="px-1">/</span>
                                <span>{{ \Carbon\Carbon::parse($article->published_at)->translatedFormat('d F Y') }}</span>
                            </div>
                            <div>
                                <h3 class="mb-3">{{ $article->title }}</h3>
                                <div>{!! $article->content !!}</div>
                            </div>
                        </div>
                    </div>
                    <!-- News Detail End -->

                    <!-- Comment List Start -->
                    <div class="bg-light mb-3" style="padding: 30px;">
                        <h3 class="mb-4">Editor</h3>
                        <div class="d-flex align-items-center mb-4">
                            <img src="{{ asset('portal-assets/img/user.jpg') }}" alt="Image" 
                                 class="img-fluid mr-3 mt-1" 
                                 style="width: 45px; height: 45px; border-radius: 50%; object-fit: cover;">
                            <div>
                                <h6 class="mb-0"><span style="color: red;">{{ $article->user->name }}</span></h6>
                            </div>
                        </div>
                    </div>

                    
                    <!-- Comment List End -->

                </div>

                <div class="col-lg-4 pt-3 pt-lg-0">

                    <!-- Popular News Start -->
                    <div class="pb-3">
                        <div class="bg-light py-2 px-4 mb-3">
                            <h3 class="m-0">Terkini</h3>
                        </div>

                        @foreach ( $artikelTerbaru as $terkini )  
                        <div class="d-flex mb-3">
                            <img src="{{ asset($terkini->thumbnail) }}" style="width: 100px; height: 100px; object-fit: cover;">
                            <div class="w-100 d-flex flex-column justify-content-center bg-light px-3" style="height: 100px;">
                                <div class="mb-1" style="font-size: 13px;">
                                    <a href="">{{ $terkini->category->name }}</a>
                                    <span class="px-1">/</span>
                                    <span>{{ \Carbon\Carbon::parse($terkini->published_at)->translatedFormat('d F Y') }}</span>
                                </div>
                                <a class="h6 m-0" href="{{ route('public.article.show', $terkini->slug) }}">{{ \illuminate\Support\Str::limit($terkini->title, 50) }}</a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <!-- Popular News End -->

                    <!-- Tags Start -->
                    <div class="pb-3">
                        <div class="bg-light py-2 px-4 mb-3">
                            <h3 class="m-0">Tags</h3>
                        </div>
                        <div class="d-flex flex-wrap m-n1">
                            @forelse ($article->tags as $tag)
                                <a href="" class="btn btn-sm btn-outline-secondary m-1">{{ $tag->name }}</a>
                            @empty
                                <p class="text-muted m-1">Tidak ada Tag</p>
                            @endforelse
                            
                        </div>
                    </div>
                    <!-- Tags End -->
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- News With Sidebar End -->

    @include('public.partials.footer')