document.addEventListener('DOMContentLoaded', function () {
    // Ambil semua tombol hapus artikel
    const deleteButtons = document.querySelectorAll('.btn-delete-user');

    deleteButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            const form = this.closest('form');

            Swal.fire({
                title: 'Hapus user ini??',
                text: "Data yang dihapus tidak bisa dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Hapus',
                cancelButtonText: 'Batal',
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit(); // submit form jika konfirmasi OK
                }
            });
        });
    });
});