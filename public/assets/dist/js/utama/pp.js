$(document).ready(function() {

    // Event ketika tombol edit di-click
    $(document).on('click', '#edit_pp', function() {
        var id = $(this).data('id'); // Ambil ID dari tombol edit
        $('#modal-pp').modal('show');
        $('#judul_pp').html('EDIT DATA PP');
    });


});