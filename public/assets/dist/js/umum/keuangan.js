$(document).ready(function() {

    // Event ketika tombol edit di-click
    $(document).on('click', '#edit_keu', function() {
        var id = $(this).data('id'); // Ambil ID dari tombol edit
        $('#modal_evkeu').modal('show');
        $('#judul_evkeu').html('EDIT DATA KEUANGAN');
        
    $.ajax({
        type: "GET",
        url: "/dataKeuBy/"+ id,
        success: function (data) {
        $.each(data.data, function (index, item) {
            $('#idKeu').val(id);
            $('#labaStlPjk').val(item.labaStlPjk);
            $('#jmlEkuitas').val(item.jmlEkuitas);
            $('#biayaOps').val(item.biayaOps);
            $('#PndptnOps').val(item.PndptnOps);
            $('#kaStrkas').val(item.kaStrkas);
            $('#HutangLancar').val(item.HutangLancar);
            $('#JmlPnrmRekAir').val(item.JmlPnrmRekAir);
            $('#jmlRekAir').val(item.jmlRekAir);
            $('#TotalAktiva').val(item.TotalAktiva);
            $('#TotalHutang').val(item.TotalHutang);
            $('#form-keuangan').attr('action', '/keuUpdate')
      
             // Mengatur nilai input bulan dengan format YYYY-MM
          $('#date').val(item.bulanTahun.replace(/(\w+) (\d{4})/, function(_, bulan, tahun) {
            var bulanIndex = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
            return `${tahun}-${('0' + (bulanIndex.indexOf(bulan) + 1)).slice(-2)}`;
        }));
  
      });
    }
    });
        
});


});