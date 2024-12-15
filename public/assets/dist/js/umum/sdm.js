$(document).ready(function() {
    $(document).on('click', '#edit_sdm', function() {
        var id = $(this).data('id');
        $('#modal-sdm').modal('show');
        $('#judul_sdm').empty();
        $('#judul_sdm').html('EDIT DATA ASPEK SDM');
        $('#form-sdm').attr('action', '/sdmEdit');
        $.ajax({
          type: "GET",
          url: "/dataSdmBy/"+ id,
          success: function (data) {
          $.each(data.data, function (index, item) {
              $('#idSdm').val(id);
              $('#JmlPgwai').val(item.JmlPgwai);
              $('#JmlPlgn1000').val(item.JmlPlgn1000);
              $('#JmlPegDiklat').val(item.JmlPegDiklat);
              $('#RealByDiklat').val(item.RealByDiklat);
              $('#RealByPeg').val(item.RealByPeg);
              
              $('#date').val(item.bulanTahun.replace(/(\w+) (\d{4})/, function(_, bulan, tahun) {
              var bulanIndex = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
              return `${tahun}-${('0' + (bulanIndex.indexOf(bulan) + 1)).slice(-2)}`;
          }));
    
        });
      }
      });
       
    })
})