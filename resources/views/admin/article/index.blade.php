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
                    <h3>Berita</h3>
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
                            <h4 class="card-title mb-0">Daftar Berita</h4>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahBeritaModal">
                                    + Tambah Berita
                                </button>
                        </div>
                        
                        <div class="card-content">
                            <div class="card-body">
                                <!-- Table with outer spacing -->
                                <div class="table-responsive">
                                    <table class="table table-lg">
                                        <thead>
                                            <tr>
                                                <th style="width: 35%">Judul</th>
                                                <th>Kategori</th>
                                                <th>Penulis</th>
                                                <th>Status</th>
                                                <th>Dipublikasikan</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($articles as $article)
                                            <tr>
                                                <td class="font-bold ms-0 mb-0">{{ $article->title }}</td>
                                                <td>{{ $article->category->name ?? '-' }}</td>
                                                <td class="text-bold-500">{{ $article->user->name ?? '-' }}</td>
                                                <td>
                                                    @if ($article->is_published)
                                                        <span class="badge bg-success">Published</span>
                                                    @else
                                                        <span class="badge bg-secondary">Draft</span>
                                                    @endif
                                                </td>
                                                <td>{{ $article->published_at ? $article->published_at->format('d M Y') : '-' }}</td>
                                                <td>
                                                    <a href="{{ route('public.article.show', $article->slug) }}" target="_blank" class="btn btn-sm btn-info"><i class="bi bi-eye"></i></a>

                                                    <a href="#" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editBeritaModal{{ $article->id }}">
                                                        <i class="bi bi-pencil-square"></i>
                                                    </a>

                                                    <form action="{{ route('admin.articles.destroy', $article) }}" method="POST" class="d-inline delete-article-form">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button" class="btn btn-sm btn-danger btn-delete-article">
                                                            <i class="bi bi-trash"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                            @empty
                                            <tr>
                                                <td colspan="6" class="text-center">Belum ada artikel</td>
                                            </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                                <div class="d-flex justify-content-end">
                                    {{ $articles->links('vendor.pagination.bootstrap-4') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- Modal Tambah Berita -->
    <div class="modal fade" id="tambahBeritaModal" tabindex="-1" aria-labelledby="tambahBeritaModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-xl">
        <div class="modal-content">

          <form action="{{ route('admin.articles.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="modal-header">
              <h5 class="modal-title" id="tambahBeritaModalLabel">Tambah Berita Baru</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
              <div class="mb-3">
                <label for="title" class="form-label">Judul Berita</label>
                <input type="text" class="form-control" id="title" name="title" required value="{{ old('title') }}">
              </div>

              <div class="mb-3">
                <label for="category_id" class="form-label">Kategori</label>
                <select class="form-select" id="category_id" name="category_id" required>
                  <option value="" disabled selected>Pilih Kategori</option>
                  @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                  @endforeach
                </select>
              </div>

              <div class="mb-3">
                <label for="content" class="form-label">Isi Berita</label>
                <textarea class="form-control" id="content" name="content" rows="5">{{ old('content') }}</textarea>
              </div>

              <div class="mb-3">
                <label for="">Tags</label>
                  <div class="form-group">
                    <select class="choices form-select multiple-remove"name="tags[]" multiple="multiple">
                      <optgroup label="Tags">
                        @foreach ($tags as $tag)
                          <option value="{{ $tag->id }}" {{ isset($article) && $article->tags->contains($tag->id) ? 'selected' : '' }}>{{ $tag->name }}</option>
                        @endforeach
                      </optgroup>
                    </select>
                  </div>
              </div>

                <div class="mb-3">
                  <label for="thumbnail" class="form-label">Thumbnail</label>
                  <input class="form-control" type="file" id="thumbnail" name="thumbnail" accept="image/*" onchange="previewThumbnail(event)">
                  <img id="thumbnailPreview" src="#" alt="Preview Thumbnail" style="display:none; margin-top:10px; max-height:150px; border-radius: 5px; object-fit: contain;">
                </div>

              <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="is_published" name="is_published" value="1" {{ old('is_published') ? 'checked' : '' }}>
                <label class="form-check-label" for="is_published">Publish langsung</label>
              </div>
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
              <button type="submit" class="btn btn-primary">Upload Berita</button>
            </div>

          </form>
        </div>
      </div>
    </div>


    {{-- Modal Edit --}}
    @foreach ($articles as $article)
    <div class="modal fade" id="editBeritaModal{{ $article->id }}" tabindex="-1" aria-labelledby="editBeritaModalLabel{{ $article->id }}" aria-hidden="true">
      <div class="modal-dialog modal-xl">
        <div class="modal-content">

          <form action="{{ route('admin.articles.update', $article->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="modal-header">
              <h5 class="modal-title" id="editBeritaModalLabel{{ $article->id }}">Edit Berita</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
              <div class="mb-3">
                <label for="title{{ $article->id }}" class="form-label">Judul Berita</label>
                <input type="text" class="form-control" id="title{{ $article->id }}" name="title" required value="{{ $article->title }}">
              </div>

              <div class="mb-3">
                <label for="category_id{{ $article->id }}" class="form-label">Kategori</label>
                <select class="form-select" id="category_id{{ $article->id }}" name="category_id" required>
                  @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $article->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                  @endforeach
                </select>
              </div>

              <div class="mb-3">
                <label for="content{{ $article->id }}" class="form-label">Isi Berita</label>
                <textarea class="form-control" id="content{{ $article->id }}" name="content" rows="5">{{ $article->content }}</textarea>
              </div>

              <div class="mb-3">
                <label for="">Tags</label>
                  <div class="form-group">
                    <select class="choices form-select multiple-remove"name="tags[]" multiple="multiple">
                      <optgroup label="Tags">
                        @foreach ($tags as $tag)
                          <option value="{{ $tag->id }}" {{ isset($article) && $article->tags->contains($tag->id) ? 'selected' : '' }}>{{ $tag->name }}</option>
                        @endforeach
                      </optgroup>
                    </select>
                  </div>
              </div>

              <div class="mb-3">
                <label for="thumbnail{{ $article->id }}" class="form-label">Thumbnail</label>
                <input class="form-control" type="file" id="thumbnail{{ $article->id }}" name="thumbnail" accept="image/*" onchange="previewThumbnailEdit(event, {{ $article->id }})">
                @if($article->thumbnail)
                  <img id="thumbnailPreviewEdit{{ $article->id }}" src="{{ asset($article->thumbnail) }}" alt="Preview Thumbnail" style="margin-top:10px; max-height:150px; border-radius: 5px; object-fit: contain;">
                @else
                  <img id="thumbnailPreviewEdit{{ $article->id }}" src="#" alt="Preview Thumbnail" style="display:none; margin-top:10px; max-height:150px; border-radius: 5px; object-fit: contain;">
                @endif
              </div>

              <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="is_published{{ $article->id }}" name="is_published" value="1" {{ $article->is_published ? 'checked' : '' }}>
                <label class="form-check-label" for="is_published{{ $article->id }}">Publish langsung</label>
              </div>
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
              <button type="submit" class="btn btn-primary">Update Berita</button>
            </div>

          </form>
        </div>
      </div>
    </div>
    @endforeach



    @include('admin.partials.footer')

    <script>
      function previewThumbnail(event) {
        const input = event.target;
        const preview = document.getElementById('thumbnailPreview');

        if (input.files && input.files[0]) {
          const reader = new FileReader();

          reader.onload = function(e) {
            preview.src = e.target.result;
            preview.style.display = 'block';
          };

          reader.readAsDataURL(input.files[0]);
        } else {
          preview.src = '#';
          preview.style.display = 'none';
        }
      }
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

    <script>
    document.addEventListener('DOMContentLoaded', function () {
    // Ambil semua tombol hapus artikel
    const deleteButtons = document.querySelectorAll('.btn-delete-article');

    deleteButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            const form = this.closest('form');

            Swal.fire({
                title: 'Yakin ingin menghapus artikel ini?',
                text: "Data yang dihapus tidak bisa dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, Hapus',
                cancelButtonText: 'Batal',
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit(); // submit form jika konfirmasi OK
                }
            });
        });
    });
});
</script>

<script>
  function previewThumbnailEdit(event, id) {
    const input = event.target;
    const preview = document.getElementById('thumbnailPreviewEdit' + id);

    if (input.files && input.files[0]) {
      const reader = new FileReader();

      reader.onload = function(e) {
        preview.src = e.target.result;
        preview.style.display = 'block';
      };

      reader.readAsDataURL(input.files[0]);
    } else {
      preview.src = '#';
      preview.style.display = 'none';
    }
  }
</script>

<script>
document.addEventListener('DOMContentLoaded', function () {
    // Modal Tambah Berita
    const tambahModal = document.getElementById('tambahBeritaModal');
    if (tambahModal) {
        tambahModal.addEventListener('shown.bs.modal', function () {
            const textarea = tambahModal.querySelector('#content');
            if (textarea && !textarea.editorInstance) {
                ClassicEditor.create(textarea).then(editor => {
                    textarea.editorInstance = editor;
                }).catch(error => console.error(error));
            }
        });
    }

    // Modal Edit Berita
    const editModals = document.querySelectorAll('[id^="editBeritaModal"]');
    editModals.forEach(modal => {
        modal.addEventListener('shown.bs.modal', function () {
            const textarea = modal.querySelector('textarea[id^="content"]');
            if (textarea && !textarea.editorInstance) {
                ClassicEditor.create(textarea).then(editor => {
                    textarea.editorInstance = editor;
                }).catch(error => console.error(error));
            }
        });
    });
});
</script>

<!-- Tambahkan ini SETELAH itu -->
<script>
document.addEventListener('submit', function (e) {
    const form = e.target;
    const textareas = form.querySelectorAll('textarea');

    textareas.forEach(textarea => {
        if (textarea.editorInstance) {
            textarea.value = textarea.editorInstance.getData();
        }
    });
});

document.querySelector('form').addEventListener('submit', function(e) {
  document.querySelector('#content').value = window.editor.getData();
});
</script>

<script src="{{ asset('assets/vendors/choices.js/choices.min.js') }}"></script>


</div>
