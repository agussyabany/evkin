$(document).ready(function() {
      //Edit data Pelyanan
  $(document).on('click', '#edit_pelayanan', function() {
    var id = $(this).data('id');
    $('#modal_pelayanan').modal('show');
    $('#judul_pelayanan').empty();
    $('#judul_pelayanan').html('EDIT DATA ASPEK PELAYANAN');
    $('#form-pelayanan').attr('action', '/pelEdit');
    $.ajax({
      type: "GET",
      url: "/dataPelBy/"+ id,
      success: function (data) {
      $.each(data.data, function (index, item) {
          $('#idPel').val(id);
          $('#JmlPnddkTrlyni').val(item.JmlPnddkTrlyni);
          $('#jmlPndkWil').val(item.jmlPndkWil);
          $("#kalKulasiJmlPlgn").val(item.kalKulasiJmlPlgn);
          $('#JmlPlgnThLl').val(item.JmlPlgnThLl);
          $('#AduanSlsai').val(item.AduanSlsai);
          $('#JmlAduan').val(item.JmlAduan);
          $("#UjiKualitas").val(item.UjiKualitas);
          $('#titikUji').val(item.titikUji);
          $('#JmlAirTrjualDom').val(item.JmlAirTrjualDom);
          $('#JmlPlgnDom').val(item.JmlPlgnDom);
          $('#tahunIni').val(item.JmlPlgnDom);
          $('#form-pelayanan').attr('action', '/pelEdit');
          
          $('#date').val(item.bulanTahun.replace(/(\w+) (\d{4})/, function(_, bulan, tahun) {
          var bulanIndex = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
          return `${tahun}-${('0' + (bulanIndex.indexOf(bulan) + 1)).slice(-2)}`;
      }));

    });
  }
  });
   
})
    

})
