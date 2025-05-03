$(document).ready(function() {
    $('#edit_bagian').on('click', function() {
        //alert("modal");
       $('#Modal_bagian').modal('show');
       $('#judulmodal').empty();
       $('#judulmodal').append('Edit Data Bagian');
});

$(document).on('click', '.edit_bagian', function() {
    var id = $(this).data('id');         // Ambil ID bagian dari tombol edit
    var bagian = $(this).data('bagian'); // Ambil nama bagian dari tombol edit

    // Isi input form modal dengan nama bagian yang diambil
    $('#inputNamaBagian').val(bagian);

    // Set action form ke URL update berdasarkan ID bagian
    $('#editForm').attr('action', '/bagian/' + id);
    
    // Tampilkan modal edit
    $('#Modal_bagian').modal('show');
});

// Fungsi Hapus Data
$(document).on('click', '.delete_bagian', function() {
        var id = $(this).data('id'); // Ambil ID data bagian
        var confirmDelete = confirm('Apakah Anda yakin ingin menghapus data ini?');

        if (confirmDelete) {
            $.ajax({
                url: '/bagian/' + id,  // URL route ke controller untuk DELETE
                type: 'DELETE',
                data: {
                    "_token": "{{ csrf_token() }}", // CSRF token Laravel
                },
                success: function(response) {
                    // Hapus baris dari tabel jika berhasil
                    $('#row-' + id).remove();
                    alert('Data berhasil dihapus!');
                },
                error: function(xhr) {
                    alert('Terjadi kesalahan saat menghapus data.');
                }
            });
        }
    });

    // Fungsi Edit Data
    $(document).on('submit', '#updateForm', function(e) {
        e.preventDefault();  // Mencegah reload halaman
    
        var formData = $(this).serialize();  // Ambil data dari form
        var actionUrl = $(this).attr('action');  // URL action dari form
    
        $.ajax({
            url: actionUrl,
            type: 'PUT',
            data: formData,
            success: function(response) {
                // Jika update berhasil, update data di tabel tanpa refresh
                $('#row-' + response.id + ' td:nth-child(2)').text(response.bagian);  // Perbarui nama bagian di tabel
                $('#Modal_bagian').modal('hide');  // Sembunyikan modal
                // Hapus atau komentar baris alert jika tidak diperlukan
                // alert('Data berhasil diupdate!');
            },
            error: function(xhr) {
                console.log(xhr.responseText);  // Log error untuk debugging
                alert('Terjadi kesalahan saat mengupdate data.');
            }
        });
    });   
})    
