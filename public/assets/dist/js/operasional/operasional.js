$(document).ready(function() {
     //Edit data Operasional
   $(document).on('click', '#edit_operasional', function() {
    var id = $(this).data('id');
    $('#modal_operasional').modal('show');
    $('#judul_operasional').empty();
    $('#judul_operasional').html('EDIT DATA ASPEK OPERASIONAL');
    $('#form-operasional').attr('action', '/opEdit');
    $.ajax({
      type: "GET",
      url: "/dataOpBy/"+ id,
      success: function (data) {
      $.each(data.data, function (index, item) {
          $('#idOps').val(id);
          $('#VolProdRil').val(item.VolProdRil);
          $('#KpstsTrpsng').val(item.KpstsTrpsng)
          $('#KalkulasiJumAir').val(item.KalkulasiJumAir)
          $('#JmlAirDist').val(item.JmlAirDist);
          $('#JmlWktPly').val(item.JmlWktPly);
          $('#Plgnlayan').val(item.Plgnlayan);
          $('#PlgnAktiv').val(item.PlgnAktiv);
          $('#MtrAirGnti').val(item.MtrAirGnti);

         
    
           // Mengatur nilai input bulan dengan format YYYY-MM
        $('#date').val(item.bulanTahun.replace(/(\w+) (\d{4})/, function(_, bulan, tahun) {
          var bulanIndex = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
          return `${tahun}-${('0' + (bulanIndex.indexOf(bulan) + 1)).slice(-2)}`;
      }));

    });
  }
  });
   
})
})