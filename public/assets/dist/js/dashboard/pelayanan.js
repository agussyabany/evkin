$(document).ready(function() {

    //Cakupan Layanan
    $(document).on('click', '#cakup', function() {
        $('#modal-lg').modal('show');
        $('#judul').empty();
        $('#chartKinerja').empty();
        $('#judul').html('CAKUPAN PELAYANAN TEKNIS');
        kosong();
        $('#persen').html('X 100 %');
        $('#a').html('Jumlah Penduduk Terlayani');
        $('#b').html('Jumlah penduduk wilayah pelayanan');
        $('#nilai').html('4');
        $('#target').html('5')

        $.ajax({
          url: '/cakupan',
          type: 'GET',
          dataType: 'json',
          success: function(response) {
              console.log('Data berhasil diterima:', response);
              let JmlPnddkTrlyniFormatted = (response.JmlPnddkTrlyni).toLocaleString('id-ID');
              let jmlPndkWilFormatted = response.jmlPndkWil.toLocaleString('id-ID');
              $('#a_nilai').html(JmlPnddkTrlyniFormatted);
              $('#b_nilai').html(jmlPndkWilFormatted);

              var JmlPnddkTrlyni = response.JmlPnddkTrlyni;
              var jmlPndkWil = response.jmlPndkWil;
              var persenTase = (JmlPnddkTrlyni / jmlPndkWil) * 100;
              var persenTaseFormatted = persenTase.toFixed(2);
               $('#hasil').html(persenTaseFormatted +'%');
          },
          error: function(xhr, status, error) {
              console.error('Error:', error);
          }
      })
      var dataGrafik =[77.74,79.42,79.94,81.12,81.51,81.74,82.01,82.3,82.55];
      grafik(dataGrafik);


      })
      //Aduan
      $(document).on('click', '#aduan', function() {
        $('#modal-lg').modal('show');
        $('#judul').empty();
        $('#judul').html('PENEYELESAIAN PENGADUAN');
        kosong();
        $('#persen').html('X 100 %');
        $('#a').html('Pengaduan Selesai Ditangani');
        $('#a_nilai').html('10.653');
        $('#b').html('Jumlah Pengaduan');
        $('#b_nilai').html('10.653');
        $('#hasil').html('100 %');
        $('#nilai').html('5');
        $('#target').html('5')
      })
      //Konsumsi Air Domestik
      $(document).on('click', '#dom', function() {
        $('#modal-lg').modal('show');
        $('#judul').empty();
        $('#judul').html('KONSUMSI AIR DOMESTIK');
        kosong();
        $('#persen').html('X 100 %');
        $('#a').html('Jml air yg terjual pada pel.domestik');
        $('#a_nilai').html('51.734.497');
        $('#b').html('Jumlah Pelanggan Domestik');
        $('#b_nilai').html('168.787');
        $('#hasil').html('25,54');
        $('#nilai').html('4');
        $('#target').html('5')
      })

//Kulaitas Air Pelnggan
  $(document).on('click', '#kualitas', function() {
    $('#modal-lg').modal('show');
    $('#judul').empty();
    $('#judul').html('KUALIATAS AIR PELANGGAN');
    kosong();
    $('#persen').html('X 100 %');
    $('#a').html('Jml Uji Kualitas Yg Memenuhi Syarat ');
    $('#a_nilai').html('188');
    $('#b').html('Jumlah Titik yg Diuji atau Titik Minimal');
    $('#b_nilai').html('1.914');
    $('#hasil').html('9,82 %');
    $('#nilai').html('1');
    $('#target').html('5')
  })

  //Pertumbuhan Pelanggan
$(document).on('click', '#pertumbuhan', function() {
  $('#modal-lg').modal('show');
  $('#judul').empty();
  $('#judul').html('PERTUMBUHAN PELANGGAN');
  kosong();
  $('#persen').html('X 100 %');
  $('#a').html('Jumlah Pelanggan Tahun ini - Jumlah Pelanggan Tahun Lalu');
  $('#a_nilai').html('9.721');
  $('#b').html('Jumlah Pelanggan Tahun Lalu');
  $('#b_nilai').html('163.933');
  $('#hasil').html('5,93%');
  $('#nilai').html('2');
  $('#target').html('5')
})

  //Edit data Pelyanan
  $(document).on('click', '#edit_pelayanan', function() {
    var id = $(this).data('id');
    $('#modal-pelayanan').modal('show');
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
          
          $('#date').val(item.bulanTahun.replace(/(\w+) (\d{4})/, function(_, bulan, tahun) {
          var bulanIndex = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
          return `${tahun}-${('0' + (bulanIndex.indexOf(bulan) + 1)).slice(-2)}`;
      }));

    });
  }
  });
   
})

//Tambah data Operasional
$(document).on('click', '#tambah_pelayanan', function() {
  $('#judul_pelayanan').empty();
  $('#judul_pelayanan').html('TAMBAH DATA ASPEK PELAYANAN');
  $('#form-pelayanan').attr('action', '/pelSave');
 })


})

