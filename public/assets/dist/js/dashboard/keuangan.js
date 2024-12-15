$(document).ready(function() {

    //REO BUTTON
  $(document).on('click', '#roe', function() {
    $('#modal-lg').modal('show');
    $('#judul').empty();
    $('#chartKinerja').empty();
    $('#judul').html('RETURN ON EQUITY');
    kosong();
    $('#persen').html('X 100%');
    $('#a').html('Laba Setelah Pajak');
    //$('#a_nilai').html('73.897.071.387');
    $('#b').html('Jumlah Ekuitas');
    //$('#b_nilai').html('577.162.239.562');
    //$('#hasil').html('12,8 %');
    $('#nilai').html('5');
    $('#target').html('5')

    $.ajax({
      url: '/laba',
      type: 'GET',
      dataType: 'json',
      success: function(response) {
          console.log('Data berhasil diterima:', response);
          let labaStlPjkFormatted = response.labaStlPjk.toLocaleString('id-ID');
          let jmlEkuitasFormatted = response.jmlEkuitas.toLocaleString('id-ID');
          $('#a_nilai').html(labaStlPjkFormatted);
          $('#b_nilai').html(jmlEkuitasFormatted);

          var labaStlPjk = response.labaStlPjk;
          var jmlEkuitas = response.jmlEkuitas;
          var persenTase = (labaStlPjk / jmlEkuitas) * 100;
          var persenTaseFormatted = persenTase.toFixed(2);
           $('#hasil').html(persenTaseFormatted +'%');
      },
      error: function(xhr, status, error) {
          console.error('Error:', error);
      }
  })
  var dataGrafik =[1.51,1.32,1.09,1.79,1.19,2.24,1.36,2.21,1.17];
  grafik(dataGrafik);
  })
  //Ratio Operational BUTTON
  $(document).on('click', '#rop', function() {
    $('#modal-lg').modal('show');
    $('#judul').empty();
    $('#judul').html('RATIO OPERATIONAL');
    kosong();
    $('#persen').html('/');
    $('#a').html('Biaya Operasi');
    $('#a_nilai').html('354.746.734.631');
    $('#b').html('Pendapatan Operasi');
    $('#b_nilai').html('467.368.442.487');
    $('#hasil').html('0,76');
    $('#nilai').html('3');
    $('#target').html('5')
    
  })
  //Ratio Kas Button
  $(document).on('click', '#rok', function() {
    $('#modal-lg').modal('show');
    $('#judul').empty();
    $('#judul').html('RATIO KAS');
    kosong();
    $('#persen').html('X 100 %');
    $('#a').html('Kas + Setara Kas');
    $('#a_nilai').html('132.205.857.557');
    $('#b').html('Hutang Lancar');
    $('#b_nilai').html('40.259.283.931');
    $('#hasil').html('328,39 %');
    $('#nilai').html('5');
    $('#target').html('5')
    
  })
  //Efektifitas Penagihan Button
  $(document).on('click', '#ep', function() {
    $('#modal-lg').modal('show');
    $('#judul').empty();
    $('#judul').html('EFEKTIFITAS PENAGIHAN');
    kosong();
    $('#persen').html('X 100 %');
    $('#a').html('Jumlah Penerimaan Rekening Air');
    $('#a_nilai').html('354.089.247.034');
    $('#b').html('Jumlah Rekening Air');
    $('#b_nilai').html('408.213.909.865');
    $('#hasil').html('86,74 %');
    $('#nilai').html('4');
    $('#target').html('5')
  })
  //Solavbilitas Button
  $(document).on('click', '#solv', function() {
    $('#modal-lg').modal('show');
    $('#judul').empty();
    $('#judul').html('SOLVABILITAS');
    kosong();
    $('#persen').html('X 100 %');
    $('#a').html('Total Aktiva');
    $('#a_nilai').html('630.296.415.666');
    $('#b').html('Total Hutang');
    $('#b_nilai').html('53.134.176.104');
    $('#hasil').html('1.186,24 %');
    $('#nilai').html('5');
    $('#target').html('5')
  })

  //Edit data keuangan
  $(document).on('click', '#edit_keuangan', function() {
    var id = $(this).data('id');
    $('#modal-keuangan').modal('show');
    $('#judul_keuangan').empty();
    $('#judul_keuangan').html('EDIT DATA ASPEK KEUNGAN');
    $('#form-keuangan').attr('action', '/keuEdit');
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
    
           // Mengatur nilai input bulan dengan format YYYY-MM
        $('#date').val(item.bulanTahun.replace(/(\w+) (\d{4})/, function(_, bulan, tahun) {
          var bulanIndex = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
          return `${tahun}-${('0' + (bulanIndex.indexOf(bulan) + 1)).slice(-2)}`;
      }));

    });
  }
  });
   
})


  
 //Tambah data keuangan
 $(document).on('click', '#tambah_keuangan', function() {
  $('#judul_keuangan').empty();
  $('#judul_keuangan').html('TAMBAH DATA ASPEK KEUANGAN');
  $('#form-keuangan').attr('action', '/keuSave');
 })

          

  

})