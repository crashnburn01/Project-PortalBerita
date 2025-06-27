@include('admin.partials.header')

@php
    $isSuperadmin = Auth::user()->role === 'superadmin';
@endphp

        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-heading">
                <h3>Profile Statistics</h3>
            </div>
            <div class="page-content">
                <section class="row">
                    <div class="col-12 col-lg-9">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Profile Visit</h4>
                                    </div>
                                    <div class="card-body">
                                        <div id="chart-profile-visit"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 col-xl-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Postingan Terbaru</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-hover table-lg">
                                                <thead>
                                                    <tr>
                                                        <th>Judul Postingan</th>
                                                        <th>Tanggal Publish</th>
                                                        <th>Editor</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($articles as $article)
                                                    

                                                    <tr>
                                                        <td class="col-6">
                                                            <p class="font-bold ms-0 mb-0">{{ $article->title }}</p>
                                                        </td>
                                                        <td class="col-auto">
                                                            <p class=" mb-0">{{ \Carbon\Carbon::parse($article->published_at)->translatedFormat('d F Y') }}</p>
                                                        </td>
                                                        <td class="col-auto">
                                                            <p class="mb-0">{{ $article->user->name }}</p>
                                                        </td>
                                                        <td class="col-auto">
                                                            <a href="{{ route('public.article.show', $article->slug) }}" target="_blank" class="btn btn-sm btn-info"><i class="bi bi-eye"></i></a>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    @php
                        use Illuminate\Support\Facades\Auth;

                        $user = Auth::user();

                        // Atur zona waktu Indonesia
                        date_default_timezone_set('Asia/Jakarta');
                        $hour = date('H');

                        if ($hour >= 5 && $hour < 11) {
                            $greeting = 'Selamat Pagi';
                        } elseif ($hour >= 11 && $hour < 15) {
                            $greeting = 'Selamat Siang';
                        } elseif ($hour >= 15 && $hour < 18) {
                            $greeting = 'Selamat Sore';
                        } else {
                            $greeting = 'Selamat Malam';
                        }
                    @endphp

                    <div class="col-12 col-lg-3">
                        <div class="card">
                            <div class="card-body py-4 px-4">
                                <div class="d-flex align-items-center">
                                    <div class="avatar avatar-xl">
                                        <img src="{{ asset('assets/images/faces/1.jpg') }}" alt="Avatar">
                                    </div>
                                    <div class="ms-3 name">
                                        <h5 class="font-bold">{{ $greeting }}</h5>
                                        <h6 class="text-muted mb-0">
                                            {{ $user->name }}
                                        </h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h4>Quick Setups</h4>
                            </div>
                            <div class="card-body px-3 py-4-5">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="stats-icon purple">
                                            <i class="iconly-boldPlus"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <a href="{{ route('admin.articles.index') }}">
                                            <h6 class="text-muted font-semibold">Quick Add</h6>
                                            <h6 class="font-extrabold mb-0">Tambah Berita</h6>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            @if ($isSuperadmin)
                            <div class="card-body px-3 py-4-5">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="stats-icon blue">
                                            <i class="iconly-boldSetting"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <a href="{{ route('admin.users.index') }}">
                                            <h6 class="text-muted font-semibold">Quick Settings</h6>
                                            <h6 class="font-extrabold mb-0">Manage Account</h6>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </section>
            </div>

@include('admin.partials.footer')

<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    @if (session('success'))
        Swal.fire({
            toast: true,
            position: 'top-end',
            icon: 'success',
            title: '{{ session('success') }}',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true
        });
    @endif

    @if (session('error'))
        Swal.fire({
            toast: true,
            position: 'top-end',
            icon: 'error',
            title: '{{ session('error') }}',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true
        });
    @endif
</script>

<script>
    function logoutConfirm(e) {
        e.preventDefault();
        Swal.fire({
            title: 'Yakin ingin logout?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya, logout',
            cancelButtonText: 'Batal',
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('logout-form').submit();
            }
        });
    }
</script>

</body>

</html>