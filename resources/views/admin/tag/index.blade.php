@include('admin.partials.header')

<div id="main">
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>

    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Tag</h3>
                    <br>
                </div>
            </div>
        </div>

        <!-- Basic Tables start -->
        <section class="section">
            <div class="row" id="basic-table">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h4 class="card-title mb-0">Daftar Tag</h4>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahBeritaModal">
                                    + Tambah Tag
                                </button>
                        </div>

                        <div class="card-content">
                            <div class="card-body">
                                <!-- Table with outer spacing -->
                                <div class="table-responsive">
                                    <table class="table table-lg">
                                        <thead>
                                            <tr>
                                                <th>Nama Tag</th>
                                                <th>Jumlah Artikel</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($tags as $tag)
                                            <tr>
                                                <td class="text-bold-500">{{ $tag->name }}</td>
                                                <td class="text-bold-500">{{ $tag->articles_count }}</td>
                                                <td>

                                                    <a href="#" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editBeritaModal {{ $tag->id }}">
                                                        <i class="bi bi-pencil-square"></i>
                                                    </a>

                                                    <form action="{{ route('admin.tags.destroy', $tag) }}" method="POST" class="d-inline delete-article-form">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button" class="btn btn-sm btn-danger btn-delete-tag">
                                                            <i class="bi bi-trash"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                            @empty
                                            <tr>
                                                <td colspan="6" class="text-center">Belum ada Tag</td>
                                            </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                                <div class="d-flex justify-content-end">
                                    {{-- disini pasang pagination --}}
                                    {{ $tags->links('vendor.pagination.bootstrap-4') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- Modal Tambah Kategori -->
    <div class="modal fade" id="tambahBeritaModal" tabindex="-1" aria-labelledby="tambahBeritaModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">

          <form action="{{ route('admin.tags.store') }}" method="POST">
            @csrf

            <div class="modal-header">
              <h5 class="modal-title" id="tambahBeritaModalLabel">Tambah Tag Baru</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
              <div class="mb-3">
                <label for="name" class="form-label">Nama Tag</label>
                <input type="text" class="form-control" id="nameTag" name="nameTag" required value="{{ old('nameTag') }}">
              </div>

              <div class="mb-3">
                <label for="slug" class="form-label">Slug</label>
                <input type="text" class="form-control" id="slug" name="slug" required value="{{ old('slug') }}">
                <small class="text-muted">Slug biasanya berupa huruf kecil tanpa spasi, gunakan tanda strip (-) untuk pemisah</small>
              </div>
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
              <button type="submit" class="btn btn-primary">Tambah Tag</button>
            </div>

          </form>
        </div>
      </div>
    </div>

@include('admin.partials.footer')

    <script>
      // Optional: Auto-generate slug dari nama tag
      document.getElementById('nameTag').addEventListener('input', function () {
        let slugInput = document.getElementById('slug');
        let slug = this.value.toLowerCase()
                              .replace(/[^a-z0-9\s-]/g, '')   // hilangkan karakter khusus
                              .trim()
                              .replace(/\s+/g, '-');          // spasi jadi strip
        slugInput.value = slug;
      });
    </script>

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

        @if (session('failed'))
            Swal.fire({
                toast: true,
                position: 'top-end',
                icon: 'error',
                title: '{{ session('failed') }}',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true
            });
        @endif

        // Notifikasi error validasi
        @if ($errors->any())
            let errorMessages = `{!! implode('<br>', $errors->all()) !!}`;
            Swal.fire({
                toast: true,
                position: 'top-end',
                icon: 'error',
                title: 'Unggahan Gagal',
                html: errorMessages,
                showConfirmButton: false,
                confirmButtonText: 'Oke',
                timer: 6000,
                timerProgressBar: true
            });
        @endif

        document.querySelectorAll('.btn-delete-tag').forEach(button => {
        button.addEventListener('click', function () {
            const form = this.closest('form');

            Swal.fire({
                title: 'Hapus Tag ini?',
                text: "Tindakan ini tidak dapat dibatalkan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal',
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });

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