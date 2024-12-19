$(document).ready(function() {

    //REO BUTTON
  // $(document).on('click', '#roe', function() {
  //   $('#modal-lg').modal('show');
  //   $('#judul').empty();
  //   $('#chartKinerja').empty();
  //   $('#judul').html('RETURN ON EQUITY');
  //   kosong();
  //   $('#persen').html('X 100%');
  //   $('#a').html('Laba Setelah Pajak');
  //   //$('#a_nilai').html('73.897.071.387');
  //   $('#b').html('Jumlah Ekuitas');
  //   //$('#b_nilai').html('577.162.239.562');
  //   //$('#hasil').html('12,8 %');
  //   $('#nilai').html('5');
  //   $('#target').html('5')

  //   $.ajax({
  //     url: '/roe',
  //     type: 'GET',
  //     dataType: 'json',
  //     success: function(response) {
  //         console.log('Data berhasil diterima:', response);
  //         let labaStlPjkFormatted = response.labaStlPjk.toLocaleString('id-ID');
  //         let jmlEkuitasFormatted = response.jmlEkuitas.toLocaleString('id-ID');
  //         $('#a_nilai').html(labaStlPjkFormatted);
  //         $('#b_nilai').html(jmlEkuitasFormatted);

  //         var labaStlPjk = response.labaStlPjk;
  //         var jmlEkuitas = response.jmlEkuitas;
  //         var persenTase = (labaStlPjk / jmlEkuitas) * 100;
  //         var persenTaseFormatted = persenTase.toFixed(2);
  //          $('#hasil').html(persenTaseFormatted +'%');
  //     },
  //     error: function(xhr, status, error) {
  //         console.error('Error:', error);
  //     }
  // })
  // var dataGrafik =[1.51,1.32,1.09,1.79,1.19,2.24,1.36,2.21,1.17];
  // grafik(dataGrafik);
  // })
  $.ajax({
    url: '/roe',
    method: 'GET',
    success: function (response) {
        // Tampilkan hasil di elemen HTML
        $('#hasilRoe').text(response.hasilRoe + ' %');
        $('#nilaiRoe').text(response.nilaiRoe + '/5');
        $('#colRoe').addClass(response.cls)
    },
    error: function () {
        alert('Terjadi kesalahan saat memuat data.');
    }
  });
  $(document).on('click', '#roe', function() {
    $('#modal-lg').modal('show');
    $('#judul').empty();
    $('#chartKinerja').empty();
    $('#judul').html('RETURN ON EQUITY');
    kosong();
    $('#persen').html('X 100%');
    $('#a').html('Laba Setelah Pajak');
    $('#b').html('Jumlah Ekuitas');
    $('#target').html('5')

    $.ajax({
      url: '/roe',
      type: 'GET',
      dataType: 'json',
      success: function(response) {
          console.log('Data berhasil diterima:', response);
          let labaStlPjkFormatted = response.labaStlPjk.toLocaleString('id-ID');
          let jmlEkuitasFormatted = response.jmlEkuitas.toLocaleString('id-ID');
          $('#a_nilai').html(labaStlPjkFormatted);
          $('#b_nilai').html(jmlEkuitasFormatted);
          $('#hasil').html(response.hasilRoe +'%');
          var urutanBulan = ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'];
          var dataGrafik = urutanBulan.map(bulan => response.persentaseBulanan[bulan]);
          var lab = 'Roe';
          grafik(dataGrafik,lab);
      },
      error: function(xhr, status, error) {
          console.error('Error:', error);
      }
  })
  
  })
  //Ratio Operational BUTTON
  $.ajax({
    url: '/rop',
    method: 'GET',
    success: function (response) {
        // Tampilkan hasil di elemen HTML
        $('#hasilRop').text(response.hasilRop + ' %');
        $('#nilaiRop').text(response.nilaiRop + '/5');
        $('#colRop').addClass(response.cls)
    },
    error: function () {
        alert('Terjadi kesalahan saat memuat data.');
    }
  });
  $(document).on('click', '#rop', function() {
    $('#modal-lg').modal('show');
    $('#judul').empty();
    $('#judul').html('RATIO OPERATIONAL');
    kosong();
    $('#persen').html('/');
    $('#a').html('Biaya Operasi');
    $('#b').html('Pendapatan Operasi');
    $('#target').html('5')
    
    

    $.ajax({
      url: '/rop',
      type: 'GET',
      dataType: 'json',
      success: function(response) {
          console.log('Data berhasil diterima:', response);
          let biayaOpsFormatted = response.biayaOps.toLocaleString('id-ID');
          let PndptnOpsFormatted = response.PndptnOps.toLocaleString('id-ID');
          $('#a_nilai').html(biayaOpsFormatted);
          $('#b_nilai').html(PndptnOpsFormatted);
          $('#hasil').html(response.hasilRop +'%');
          var urutanBulan = ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'];
          var dataGrafik = urutanBulan.map(bulan => response.persentaseBulanan[bulan]);
          var lab = 'Rop';
          grafik(dataGrafik,lab);
      },
      error: function(xhr, status, error) {
          console.error('Error:', error);
      }
  })
    
  })
  //Ratio Kas Button
  $.ajax({
    url: '/rok',
    method: 'GET',
    success: function (response) {
        // Tampilkan hasil di elemen HTML
        $('#hasilRok').text(response.hasilRok + ' %');
        $('#nilaiRok').text(response.nilaiRok + '/5');
        $('#colRok').addClass(response.cls)
    },
    error: function () {
        alert('Terjadi kesalahan saat memuat data.');
    }
  });
  $(document).on('click', '#rok', function() {
    $('#modal-lg').modal('show');
    $('#judul').empty();
    $('#judul').html('RATIO KAS');
    kosong();
    $('#persen').html('X 100 %');
    $('#a').html('Kas + Setara Kas');
    $('#b').html('Hutang Lancar');
    $('#target').html('5')

    $.ajax({
      url: '/rok',
      type: 'GET',
      dataType: 'json',
      success: function(response) {
          console.log('Data berhasil diterima:', response);
          let kaStrkasFormatted = response.kaStrkas.toLocaleString('id-ID');
          let HutangLancarFormatted = response.HutangLancar.toLocaleString('id-ID');
          $('#a_nilai').html(kaStrkasFormatted);
          $('#b_nilai').html(HutangLancarFormatted);
          $('#hasil').html(response.hasilRok +'%');
          var urutanBulan = ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'];
          var dataGrafik = urutanBulan.map(bulan => response.persentaseBulanan[bulan]);
          var lab = 'Rok';
          grafik(dataGrafik,lab);
      },
      error: function(xhr, status, error) {
          console.error('Error:', error);
      }
  })
    
  })
  //Efektifitas Penagihan Button
  $.ajax({
    url: '/ef',
    method: 'GET',
    success: function (response) {
        // Tampilkan hasil di elemen HTML
        $('#hasilEf').text(response.hasilEf + ' %');
        $('#nilaiEf').text(response.nilaiEf + '/5');
        $('#colEf').addClass(response.cls)
    },
    error: function () {
        alert('Terjadi kesalahan saat memuat data.');
    }
  });
  $(document).on('click', '#ep', function() {
    $('#modal-lg').modal('show');
    $('#judul').empty();
    $('#judul').html('EFEKTIFITAS PENAGIHAN');
    kosong();
    $('#persen').html('X 100 %');
    $('#a').html('Jumlah Penerimaan Rekening Air');
    $('#b').html('Jumlah Rekening Air');
    $('#target').html('5')

    $.ajax({
      url: '/ef',
      type: 'GET',
      dataType: 'json',
      success: function(response) {
          console.log('Data berhasil diterima:', response);
          let JmlPnrmRekAirFormatted = response.JmlPnrmRekAir.toLocaleString('id-ID');
          let jmlRekAirFormatted = response.jmlRekAir.toLocaleString('id-ID');
          $('#a_nilai').html(JmlPnrmRekAirFormatted);
          $('#b_nilai').html(jmlRekAirFormatted);
          $('#hasil').html(response.hasilEf +'%');
          var urutanBulan = ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'];
          var dataGrafik = urutanBulan.map(bulan => response.persentaseBulanan[bulan]);
          var lab = 'Rok';
          grafik(dataGrafik,lab);
      },
      error: function(xhr, status, error) {
          console.error('Error:', error);
      }
  })
  })
  //Solavbilitas Button
  $.ajax({
    url: '/sol',
    method: 'GET',
    success: function (response) {
        // Tampilkan hasil di elemen HTML
        $('#hasilSol').text(response.hasilSol + ' %');
        $('#nilaiSol').text(response.nilaiSol + '/5');
        $('#colSol').addClass(response.cls)
    },
    error: function () {
        alert('Terjadi kesalahan saat memuat data.');
    }
  });
  
  $(document).on('click', '#solv', function() {
    $('#modal-lg').modal('show');
    $('#judul').empty();
    $('#judul').html('SOLVABILITAS');
    kosong();
    $('#persen').html('X 100 %');
    $('#a').html('Total Aktiva');
    $('#b').html('Total Hutang');
    $('#target').html('5')

    $.ajax({
      url: '/sol',
      type: 'GET',
      dataType: 'json',
      success: function(response) {
          console.log('Data berhasil diterima:', response);
          let TotalAktivaFormatted = response.TotalAktiva.toLocaleString('id-ID');
          let TotalHutangFormatted = response.TotalHutang.toLocaleString('id-ID');
          $('#a_nilai').html(TotalAktivaFormatted);
          $('#b_nilai').html(TotalHutangFormatted);
          $('#hasil').html(response.hasilSol +'%');
          var urutanBulan = ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'];
          var dataGrafik = urutanBulan.map(bulan => response.persentaseBulanan[bulan]);
          var lab = 'Rok';
          grafik(dataGrafik,lab);
      },
      error: function(xhr, status, error) {
          console.error('Error:', error);
      }
  })
    
  })

})