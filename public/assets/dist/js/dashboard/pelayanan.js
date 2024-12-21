$(document).ready(function() {

    //Cakupan Layanan
    $.ajax({
      url: '/cakupan',
      method: 'GET',
      success: function (response) {
          // Tampilkan hasil di elemen HTML
          $('#cakpuanLyn').text(response.cakupan + '%');
          $('#nilaiCakup').text(response.nilaiCakup + '/5');
          $('#colCakup').addClass(response.cls)
      },
      error: function () {
          alert('Terjadi kesalahan saat memuat data.');
      }
  });
    $(document).on('click', '#cakup', function() {
        $('#modal-lg').modal('show');
        $('#judul').empty();
        $('#chartKinerja').empty();
        $('#judul').html('CAKUPAN PELAYANAN TEKNIS');
        kosong();
        $('#persen').html('X 100 %');
        $('#a').html('Jumlah Penduduk Terlayani');
        $('#b').html('Jumlah penduduk wilayah pelayanan');
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
              $('#hasil').html(response.cakupan +' %');
              $('#nilai').html(response.nilaiCakup);
              var urutanBulan = ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'];
              var dataGrafik = urutanBulan.map(bulan => response.persentaseBulanan[bulan]);
              var lab = 'Cakupan';
              grafik(dataGrafik,lab);
          },
          error: function(xhr, status, error) {
              console.error('Error:', error);
          }
      })
      


      })
      //Aduan
      $.ajax({
        url: '/aduan',
        method: 'GET',
        success: function (response) {
            // Tampilkan hasil di elemen HTML
            $('#hasilAduan').text(response.hasilAduan + '%');
            $('#nilaiAduan').text(response.nilaiAduan + '/5');
            $('#colAduan').addClass(response.cls)
        },
        error: function () {
            alert('Terjadi kesalahan saat memuat data.');
        }
      });
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

        $.ajax({
          url: '/aduan',
          type: 'GET',
          dataType: 'json',
          success: function(response) {
              console.log('Data berhasil diterima:', response);
              let AduanSlsaiFormatted = (response.AduanSlsai).toLocaleString('id-ID');
              let JmlAduanFormatted = response.JmlAduan.toLocaleString('id-ID');
              $('#a_nilai').html(AduanSlsaiFormatted);
              $('#b_nilai').html(AduanSlsaiFormatted);
              $('#hasil').html(response.hasilAduan +' %');
              $('#nilai').html(response.nilaiAduan);
              var urutanBulan = ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'];
              var dataGrafik = urutanBulan.map(bulan => response.persentaseBulanan[bulan]);
              var lab = 'Aduan';
              grafik(dataGrafik,lab);
          },
          error: function(xhr, status, error) {
              console.error('Error:', error);
          }
      })
      })
      //Konsumsi Air Domestik
      $.ajax({
        url: '/domestik',
        method: 'GET',
        success: function (response) {
            // Tampilkan hasil di elemen HTML
            $('#hasilDomestik').text(response.hasilDomestik + '%');
            $('#nilaiDomestik').text(response.nilaiDomestik + '/5');
            $('#colDomestik').addClass(response.cls)
        },
        error: function () {
            alert('Terjadi kesalahan saat memuat data.');
        }
      });
      $(document).on('click', '#dom', function() {
        $('#modal-lg').modal('show');
        $('#judul').empty();
        $('#judul').html('KONSUMSI AIR DOMESTIK');
        kosong();
        $('#persen').html('X 100 %');
        $('#a').html('Jml air yg terjual pada pel.domestik');
        $('#b').html('Jumlah Pelanggan Domestik');
        $('#target').html('5')
      })
      $.ajax({
        url: '/domestik',
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            console.log('Data berhasil diterima:', response);
            let JmlAirTrjualDomFormatted = (response.JmlAirTrjualDom).toLocaleString('id-ID');
            let JmlPlgnDomFormatted = response.JmlPlgnDom.toLocaleString('id-ID');
            $('#a_nilai').html(JmlAirTrjualDomFormatted);
            $('#b_nilai').html(JmlPlgnDomFormatted);
            $('#hasil').html(response.hasilDomestik +' %');
            $('#nilai').html(response.nilaiDomestik);
            var urutanBulan = ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'];
            var dataGrafik = urutanBulan.map(bulan => response.persentaseBulanan[bulan]);
            var lab = 'Domestik';
            grafik(dataGrafik,lab);
        },
        error: function(xhr, status, error) {
            console.error('Error:', error);
        }
    })

//Kulaitas Air Pelnggan
  $.ajax({
    url: '/uji',
    method: 'GET',
    success: function (response) {
        // Tampilkan hasil di elemen HTML
        $('#hasilUji').text(response.hasilUji + '%');
        $('#nilaiUji').text(response.nilaiUji + '/5');
        $('#colUji').addClass(response.cls)
    },
    error: function () {
        alert('Terjadi kesalahan saat memuat data.');
    }
  });
  $(document).on('click', '#kualitas', function() {
    $('#modal-lg').modal('show');
    $('#judul').empty();
    $('#judul').html('KUALIATAS AIR PELANGGAN');
    kosong();
    $('#persen').html('X 100 %');
    $('#a').html('Jml Uji Kualitas Yg Memenuhi Syarat ');
    $('#b').html('Jumlah Titik yg Diuji atau Titik Minimal');
    $('#target').html('5')
    $.ajax({
      url: '/uji',
      type: 'GET',
      dataType: 'json',
      success: function(response) {
          console.log('Data berhasil diterima:', response);
          let UjiKualitasFormatted = response.UjiKualitas.toLocaleString('id-ID');
          let titikUjiFormatted = response.titikUji.toLocaleString('id-ID');
          $('#a_nilai').html(UjiKualitasFormatted);
          $('#b_nilai').html(titikUjiFormatted);
          $('#hasil').html(response.hasilUji +' %');
          $('#nilai').html(response.nilaiUji);
          var urutanBulan = ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'];
          var dataGrafik = urutanBulan.map(bulan => response.persentaseBulanan[bulan]);
          var lab = 'Uji';
          grafik(dataGrafik,lab);
      },
      error: function(xhr, status, error) {
          console.error('Error:', error);
      }
  })
  })

  //Pertumbuhan Pelanggan
  $.ajax({
    url: '/tumbuh',
    method: 'GET',
    success: function (response) {
        // Tampilkan hasil di elemen HTML
        $('#hasilTumbuh').text(response.hasilTumbuh + '%');
        $('#nilaiTumbuh').text(response.nilaiTumbuh + '/5');
        $('#colTumbuh').addClass(response.cls)
    },
    error: function () {
        alert('Terjadi kesalahan saat memuat data.');
    }
  });
$(document).on('click', '#pertumbuhan', function() {
  $('#modal-lg').modal('show');
  $('#judul').empty();
  $('#judul').html('PERTUMBUHAN PELANGGAN');
  kosong();
  $('#persen').html('X 100 %');
  $('#a').html('Jumlah Pelanggan Tahun ini - Jumlah Pelanggan Tahun Lalu');
  $('#b').html('Jumlah Pelanggan Tahun Lalu');
  $('#target').html('5')
  $.ajax({
    url: '/tumbuh',
    type: 'GET',
    dataType: 'json',
    success: function(response) {
        console.log('Data berhasil diterima:', response);
        let kalKulasiJmlPlgnFormatted = response.kalKulasiJmlPlgn.toLocaleString('id-ID');
        let JmlPlgnThLlFormatted = response.JmlPlgnThLl.toLocaleString('id-ID');
        $('#a_nilai').html(kalKulasiJmlPlgnFormatted);
        $('#b_nilai').html(JmlPlgnThLlFormatted);
        $('#hasil').html(response.hasilTumbuh +' %');
        $('#nilai').html(response.nilaiTumbuh);
        var urutanBulan = ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'];
        var dataGrafik = urutanBulan.map(bulan => response.persentaseBulanan[bulan]);
        var lab = 'Pertumbuhan';
        grafik(dataGrafik,lab);
    },
    error: function(xhr, status, error) {
        console.error('Error:', error);
    }
})
})



})

