$(document).ready(function() {
    $('#edit_pemateri').on('click', function() {
        //alert("modal");
       $('Modal_pemateri').modal('show');
       $('#judulmodalPemateri').empty();
       $('#judulmodalPemateri').append('Edit Data Bagian');

       $(document).on('click', '.edit_pemateri', function() {
        var id = $(this).data('id');
        var pemateri = $(this).data('pemateri');
        var asal = $(this).data('asal'); // Ambil data asal dari tombol edit
        
        // Isi input form modal dengan nama pemateri dan asal
        $('#inputNamaPemateri').val(pemateri);
        $('#inputAsalPemateri').val(asal);
    
        // Set action form ke URL update berdasarkan ID pemateri
        $('#editForm').attr('action', '/pemateri/' + id);
        
        // Tampilkan modal edit
        $('#Modal_pemateri').modal('show');
    });
    
    
    
    $(document).on('click', '.delete_pemateri', function() {
            var id = $(this).data('id'); // Ambil ID data pemateri
            var confirmDelete = confirm('Apakah Anda yakin ingin menghapus data ini?');
    
            if (confirmDelete) {
                $.ajax({
                    url: '/pemateri/' + id,  // URL route ke controller untuk DELETE
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
                    $('#row-' + response.id + ' td:nth-child(2)').text(response.pemateri);  // Perbarui nama pemateri di tabel
                    $('#Modal_pemateri').modal('hide');  // Sembunyikan modal
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
    
});