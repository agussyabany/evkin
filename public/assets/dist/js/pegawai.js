// TAMBAH DATA PEGAWAI
$(document).on('click', '#tambahDataPegawai', function() {
    // Reset form
    $('#formPegawai')[0].reset();
    
    // Set judul modal
    $('#judulModalPegawai').html('Tambah Data Pegawai');

    // Set action form untuk tambah data
    $('#formPegawai').attr('action', '/pegawai/store');

    // Tampilkan modal
    $('#modalPegawai').modal('show');
});


//EDIT DATA PEGAWAI
$(document).ready(function() {
    // Event ketika tombol edit di-click
    $(document).on('click', '.edit_pegawai', function() {
        var id = $(this).data('id'); // Ambil ID dari tombol edit

        // AJAX untuk mengambil data pegawai berdasarkan ID
        $.ajax({
            url: '/pegawai/' + id + '/edit', // Pastikan rute edit sesuai
            type: 'GET',
            success: function(data) {
                // Isi form modal dengan data pegawai
                $('#idPegawai').val(data.id);
                $('#namaPegawai').val(data.nama_pegawai);
                $('#nipPegawai').val(data.nip);
                $('#jabatanPegawai').val(data.jabatan);
                $('#bagianPegawai').val(data.bagian);
                $('#modalPegawai').modal('show'); // Tampilkan modal
            },
            error: function(xhr) {
                // Jika terjadi kesalahan
                alert('Terjadi kesalahan saat memuat data.');
            }
        });
    });
});

// $(document).on('click', '.edit_pegawai', function() {
//     var id = $(this).data('id');
//     $('#modalEditPegawai').modal('show');
//     $('#judulModalEditPegawai').html('EDIT PEGAWAI');

//     $.ajax({
//         type: "GET",
//         url: "pegawai/" + id + "/edit",
//         success: function(response) {
//             var item = response.data;

//             // Set nilai input
//             $('#namaPegawai').val(item.nama_pegawai);
//             $('#nipPegawai').val(item.nip);
//             $('#jabatanPegawai').val(item.jabatan).trigger('change');
//             $('#bagianPegawai').val(item.bagian).trigger('change');
//             // Ubah action form untuk update
//             $('#formPegawai').attr('action', '/pegawai/' + id + '/update');
       
//         },
//         error: function(xhr) {
//             alert('Terjadi kesalahan saat memuat data.');
//         }
//     });
// });



 //HAPUS DATA PEGAWAI
$(document).ready(function() {
    var deleteId = null;  // Variabel untuk menyimpan ID yang akan dihapus

    // Ketika tombol delete di luar modal diklik
    $(document).on('click', '.delete_pegawai', function() {
        deleteId = $(this).data('id'); // Ambil ID pegawai yang akan dihapus
        $('#modalDeletePegawai').modal('show'); // Tampilkan modal konfirmasi
    });

    // Ketika tombol "Hapus" di modal diklik
    $('#confirmDeleteButton').on('click', function() {

        if (confirm) {
            $.ajax({
                url: '/pegawai/' + deleteId,  // URL route ke controller untuk DELETE
                type: 'DELETE',
                data: {
                    "_token": "{{ csrf_token() }}", // CSRF token Laravel
                },
                success: function(response) {
                    // Hapus baris dari tabel jika berhasil
                    $('#row-' + deleteId).remove();
                    $('#modalDeletePegawai').modal('hide'); // Tutup modal setelah berhasil
                    alert('Data berhasil dihapus!');
                },
                error: function(xhr) {
                    alert('Terjadi kesalahan saat menghapus data.');
                    console.log(xhr.responseText);
                }
            });
        }
    });
});
