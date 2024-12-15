$(document).ready(function() {

    //Rasio Pegawai Pelanggan
  $(document).on('click', '#rasioPegawai', function() {
    $('#modal-lg').modal('show');
    $('#judul').empty();
    $('#judul').html('RASIO PEGAWAI TERHADAP PELANGGAN');
    kosong();
    $('#persen').html('/');
    $('#a').html('Jumlah Pagawai');
    $('#a_nilai').html('618');
    $('#b').html('(Jumlah Seluruh Pelanggan / 1000 )');
    $('#b_nilai').html('173,65');
    $('#hasil').html('3,56');
    $('#nilai').html('5');
    $('#target').html('5')
  })

  //Rasio Diklat Pegawai
  $(document).on('click', '#rasioDiklat', function() {
    $('#modal-lg').modal('show');
    $('#judul').empty();
    $('#judul').html('RASIO DIKLAT PEGAWAI');
    kosong();
    $('#persen').html('x 100%');
    $('#a').html('Jumlah Pagawai Yang Ikut Diklat');
    $('#a_nilai').html('548');
    $('#b').html('(Jumlah Pegawai)');
    $('#b_nilai').html('618');
    $('#hasil').html('88,67%');
    $('#nilai').html('5');
    $('#target').html('5')
  })

  //Rasio Biaya Diklat
  $(document).on('click', '#rasioBiaya', function() {
    $('#modal-lg').modal('show');
    $('#judul').empty();
    $('#judul').html('RASIO BIAYA DIKLAT');
    kosong();
    $('#persen').html('x 100%');
    $('#a').html('Realisasi Biaya Diklat');
    $('#a_nilai').html('3.304.299.477');
    $('#b').html('Realisasi Biaya Pegawai');
    $('#b_nilai').html('113.777.783.341');
    $('#hasil').html('2,90%');
    $('#nilai').html('2');
    $('#target').html('5')
  })

  //Edit data Sdm
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



  //SDM
        //pelanggan
        var donutPelangganCanvas = $('#pelanggan').get(0).getContext('2d');
        var valuePelanggan = 3.89; // The value you want to show (e.g., 50%)
        var remainingPelanggan = 100 - valuePelanggan; // The remaining percentage to make it 100%

        var pelangganData = {
          labels: ['Completed', 'Remaining'],
          datasets: [{
            data: [valuePelanggan, remainingPelanggan], // Your value and the remaining percentage
            backgroundColor: ['#f1c40f', '#d2d6de'], // Color for the value and the remaining part
          }]
        };

        var pelangganOptions = {
          maintainAspectRatio: false,
          responsive: true,
          cutout: '70%', // This will make it look like a donut (inner circle cutout)
          plugins: {
            tooltip: {
              callbacks: {
                label: function(tooltipItem) {
                  return tooltipItem.label + ': ' + tooltipItem.raw + '%';
                }
              }
            }
          }
        };

        // Create doughnut chart
        new Chart(donutPelangganCanvas, {
          type: 'doughnut',
          data: pelangganData,
          options: pelangganOptions
        });

        //pegawai
        var donutPegawaiCanvas = $('#pegawai').get(0).getContext('2d');
        var valuePegawai = 88.67; // The value you want to show (e.g., 50%)
        var remainingPegawai = 100 - valuePegawai; // The remaining percentage to make it 100%

        var pegawaiData = {
          labels: ['Completed', 'Remaining'],
          datasets: [{
            data: [valuePegawai, remainingPegawai], // Your value and the remaining percentage
            backgroundColor: ['#3498db', '#d2d6de'], // Color for the value and the remaining part
          }]
        };

        var pegawaiOptions = {
          maintainAspectRatio: false,
          responsive: true,
          cutout: '70%', // This will make it look like a donut (inner circle cutout)
          plugins: {
            tooltip: {
              callbacks: {
                label: function(tooltipItem) {
                  return tooltipItem.label + ': ' + tooltipItem.raw + '%';
                }
              }
            }
          }
        };

        // Create doughnut chart
        new Chart(donutPegawaiCanvas, {
          type: 'doughnut',
          data: pegawaiData,
          options: pegawaiOptions
        });

         //diklat
        var donutDiklatCanvas = $('#diklat').get(0).getContext('2d');
        var valueDiklat = 2.90; // The value you want to show (e.g., 50%)
        var remainingDiklat = 100 - valueDiklat; // The remaining percentage to make it 100%

        var diklatData = {
          labels: ['Completed', 'Remaining'],
          datasets: [{
            data: [valueDiklat, remainingDiklat], // Your value and the remaining percentage
            backgroundColor: ['#28a745', '#d2d6de'], // Color for the value and the remaining part
          }]
        };

        var diklatOptions = {
          maintainAspectRatio: false,
          responsive: true,
          cutout: '70%', // This will make it look like a donut (inner circle cutout)
          plugins: {
            tooltip: {
              callbacks: {
                label: function(tooltipItem) {
                  return tooltipItem.label + ': ' + tooltipItem.raw + '%';
                }
              }
            }
          }
        };

        // Create doughnut chart
        new Chart(donutDiklatCanvas, {
          type: 'doughnut',
          data: diklatData,
          options: diklatOptions
        });
})