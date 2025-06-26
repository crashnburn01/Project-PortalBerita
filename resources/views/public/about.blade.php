@include('public.partials.topbar')

@include('public.partials.navbar')


    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="container">
            <nav class="breadcrumb bg-transparent m-0 p-0">
                <a class="breadcrumb-item" href="#">Home</a>
                <span class="breadcrumb-item active">Tentang Kami</span>
            </nav>
        </div>
    </div>
    <!-- Breadcrumb End -->


    <!-- Contact Start -->
<div class="container-fluid py-3">
    <div class="container">
        <div class="bg-light py-2 px-4 mb-3 text-center">
            <h3 class="m-0 text-center">PROFIL</h3>

            <!-- Logo di bawah judul PROFIL -->
            <img src="{{ asset('portal-assets/img/logo.png') }}" alt="Logo LPPM" style="max-height: 100px; margin-top: 10px;">
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="bg-light mb-3" style="padding: 30px;">
                    <!-- Subjudul Lembaga (center) -->
                    <h5 class="font-weight-bold text-center mb-3">
                        LEMBAGA PENERBITAN DAN PENYIARAN MAHASISWA
                    </h5>

                    <p style="text-align: center;">
                        Lembaga Penerbitan & Penyiaran Mahasiswa Universitas Dipa Makassar yang kemudian disingkat 
                        LPPM merupakan salah satu dari banyaknya Unit Kegiatan Mahasiswa yang ada di Universitas Dipa Makassar, 
                        berdiri sejak 28 Oktober 1998 dan terus megawalperkembangan isu-isu  yang terjadi intra & esktra Universitas Dipa Makassar.
                    </p>

                    <p style="text-align: center;">
                        Berlandaskan Tri darma Perguruan tinggi, sumpah mahasiswa & kode etik Pers. LPPM sendiri memiliki 2 Fokus utama yang tidak lari dari kerja-kerja Jurnalistik (Pers) yaitu bidang Penerbitan (FORMAT) dan bidang Penyiaran. 
                        Berita yang diterbitkan oleh FOMAT tak lari dari isu isu yang terjadi dalam lingkup kampus itu sendiri, tak jarang lppm format juga ikut serta terhadap isu isu yang ada di masyarakat pada umumnya. Beralih pada penyiaran LPPM yang 
                        disiarkan melalui platform Spotif dan YouTube. Topik yang di angkat oleh podcast juga seputar info-info yang terjadi seputar kampus namun, seperti halnya berita, podcast LPPM juga dapat mengangkat teman yang ada di sekitar .
                    </p>

                    <h6 class="font-weight-bold text-center mb-3">
                        TUJUAN
                    </h6>

                    <p style="text-align: center;">
                        “Terbinanya insan pers mahasiswa yang berilmu dan bertakwa kepada Tuhan yang maha Esa,  berwawasan teknologi serta berorientasi kerakyatan dan bertanggung jawab atas terwujudnya Tri Dharma Perguruan Tinggi dan sumpah Mahasiswa.”
                    </p>
                </div>
            </div>

            <div class="col-lg-12">
                    <div class="owl-carousel owl-carousel-2 carousel-item-1 position-relative mb-3 mb-lg-0">
                        <div class="position-relative overflow-hidden" style="height: 600px;">
                            <div class="position-relative overflow-hidden" style="height: 600px;">
                                    <img class="img-fluid h-100" src="{{ asset('portal-assets/img/galeri1.jpg') }}" style="object-fit: cover;">
                            </div>
                        </div>
                        <div class="position-relative overflow-hidden" style="height: 600px;">
                            <div class="position-relative overflow-hidden" style="height: 600px;">
                                    <img class="img-fluid h-100" src="{{ asset('portal-assets/img/galeri2.jpg') }}" style="object-fit: cover;">
                            </div>
                        </div>
                        <div class="position-relative overflow-hidden" style="height: 600px;">
                            <div class="position-relative overflow-hidden" style="height: 600px;">
                                    <img class="img-fluid h-100" src="{{ asset('portal-assets/img/galeri3.jpg') }}" style="object-fit: cover;">
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>


    <!-- Contact End -->

@include('public.partials.footer')