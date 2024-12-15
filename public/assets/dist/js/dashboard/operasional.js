$(document).ready(function() {
    //Rasio Produksi
  $(document).on('click', '#rasioProd', function() {
    $('#modal-lg').modal('show');
    $('#judul').empty();
    $('#judul').html('RASIO PRODUKSI');
    kosong();
    $('#persen').html('X 100 %');
    $('#a').html('Volume Produksi Riil');
    $('#a_nilai').html('100.083.675');
    $('#b').html('Jumlah Kapasitas Terpasang');
    $('#b_nilai').html('106.749.360');
    $('#hasil').html('93,76%');
    $('#nilai').html('5');
    $('#target').html('5')
  })

  //Kehilangan Air
  $(document).on('click', '#nrw', function() {
    $('#modal-lg').modal('show');
    $('#judul').empty();
    $('#chartKinerja').empty();
    $('#judul').html('KEHILANGAN AIR');
    kosong();
    $('#persen').html('X 100 %');
    $('#a').html('Air Disistribusikan - Air Terjual');
    $('#b').html('Jumlah Air Didistribusikan');
   
    $('#nilai').html('2');
    $('#target').html('5')
    $.ajax({
          url: '/nrw',
          type: 'GET',
          dataType: 'json',
          success: function(data) {
              console.log('Data berhasil diterima:', data);
              let terDistribusiFormatted = (data.terDistribusi - data.airterjual).toLocaleString('id-ID');
              let airterjualFormatted = data.airterjual.toLocaleString('id-ID');
              $('#a_nilai').html(terDistribusiFormatted);
              $('#b_nilai').html(airterjualFormatted);

              var TerDisrirbusi = data.terDistribusi;
              var AirTerjual = data.airterjual;
              var persenTase = ((TerDisrirbusi - AirTerjual) / TerDisrirbusi) * 100;
              var persenTaseFormatted = persenTase.toFixed(2);
              $('#hasil').html(persenTaseFormatted +'%');
          },
          error: function(xhr, status, error) {
              console.error('Error:', error);
          }
      })
      //Chart
      var dataGrafik = [39.98,39.90,39.95,39.50,38.87,38.39,37.97,37.42,37.29,37.08,36.79];
      grafik(dataGrafik);

     
  })

  //Jam Operasi Layanan
  $(document).on('click', '#jam', function() {
    $('#modal-lg').modal('show');
    $('#judul').empty();
    $('#judul').html('JAM OPERASI LAYANAN');
    kosong();
    $('#persen').html('/');
    $('#a').html('Jumlah Waktu Pelayanan/Distribusi Air ke Pelanggan dalam Setahun');
    $('#a_nilai').html('8.585');
    $('#b').html('Jumlah Hari');
    $('#b_nilai').html('365');
    $('#hasil').html('23,53');
    $('#nilai').html('5');
    $('#target').html('5')
  })

  //Tekanan Air Pada SL
  $(document).on('click', '#tekanan', function() {
    $('#modal-lg').modal('show');
    $('#judul').empty();
    $('#judul').html('TEKANAN AIR PADA SR');
    kosong();
    $('#persen').html('x 100%');
    $('#a').html('Jumlah Pelanggan yang Dilayanai dengan Tekanan > 0,7 Bar');
    $('#a_nilai').html('166.089');
    $('#b').html('Jumlah Pelanggan Aktiv');
    $('#b_nilai').html('173.100');
    $('#hasil').html('95,95%');
    $('#nilai').html('5');
    $('#target').html('5')
  })

  //Kalibrasi
  $(document).on('click', '#kalibrasi', function() {
    $('#modal-lg').modal('show');
    $('#judul').empty();
    $('#judul').html('PENGGANTIAN / KALIBRASI METER AIR');
    kosong();
    $('#persen').html('X 100 %');
    $('#a').html('Jml Meter yg diganti/kalibrasi dalam setahun');
    $('#a_nilai').html('8.695');
    $('#b').html('Jumlah Pelanggan Aktif');
    $('#b_nilai').html('173.100');
    $('#hasil').html('5,2 %');
    $('#nilai').html('2');
    $('#target').html('5')
  })

   //Edit data Operasional
   $(document).on('click', '#edit_operasional', function() {
    var id = $(this).data('id');
    $('#modal-operasional').modal('show');
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

 //Tambah data Operasional
 $(document).on('click', '#tambah_operasional', function() {
  $('#judul_operasional').empty();
  $('#judul_operasional').html('TAMBAH DATA ASPEK OPERASIONAL');
  $('#form-operasional').attr('action', '/opSave');
 })


})