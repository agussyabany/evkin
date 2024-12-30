$(document).ready(function() {

    var dataRpl = window.dataRpl
    var urutanBulan = window.dataBul;
    var dataGrafik = urutanBulan.map(bulan => dataRpl[bulan]);
    var lab = 'Rasio Pegawai terhadap Pelanggan';
    var RplChartCanvas = $('#chartRpl').get(0).getContext('2d')
            var RplChartData = {
              labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July','Agustus','September','Oktober','November','Desember'],
              datasets: [
                {
                  label: lab,
                  backgroundColor: 'rgba(60,141,188,0.0)',
                  borderColor: 'rgba(60,141,188,0.8)',
                  pointRadius: 2.5,
                  pointBackgroundColor: '#ffffff',
                  pointStrokeColor: 'rgba(108, 185, 60,1)',
                  pointHighlightFill: '#fff',
                  pointHighlightStroke: 'rgba(60,141,188,1)',
                  data:dataGrafik
                }
              ]
            }
              var RplChartOptions = {
              maintainAspectRatio: false,
              responsive: true,
              legend: {
                display: false
              },
              scales: {
                xAxes: [{
                  gridLines: {
                    display: false
                  }
                }],
                yAxes: [{
                  gridLines: {
                    display: false
                  }
                }]
              }
            }
      
          new Chart(RplChartCanvas, {
              type: 'line',
              data: RplChartData,
              options: RplChartOptions
            })

//RASIO DIKLAT PEGAWAI
var dataRdp = window.dataRdp
    
    var dataGrafik = urutanBulan.map(bulan => dataRdp[bulan]);
    var lab = 'Rasio Diklat Pegawai';
    var RdpChartCanvas = $('#chartRdp').get(0).getContext('2d')
            var RdpChartData = {
              labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July','Agustus','September','Oktober','November','Desember'],
              datasets: [
                {
                  label: lab,
                  backgroundColor: 'rgba(60,141,188,0.0)',
                  borderColor: 'rgba(60,141,188,0.8)',
                  pointRadius: 2.5,
                  pointBackgroundColor: '#ffffff',
                  pointStrokeColor: 'rgba(108, 185, 60,1)',
                  pointHighlightFill: '#fff',
                  pointHighlightStroke: 'rgba(60,141,188,1)',
                  data:dataGrafik
                }
              ]
            }
              var RdpChartOptions = {
              maintainAspectRatio: false,
              responsive: true,
              legend: {
                display: false
              },
              scales: {
                xAxes: [{
                  gridLines: {
                    display: false
                  }
                }],
                yAxes: [{
                  gridLines: {
                    display: false
                  }
                }]
              }
            }
      
          new Chart(RdpChartCanvas, {
              type: 'line',
              data: RdpChartData,
              options: RdpChartOptions
            })

//Rasio Biaya Diklat
var dataRbd = window.dataRbd
    
    var dataGrafik = urutanBulan.map(bulan => dataRbd[bulan]);
    var lab = 'Rasio Biaya Diklat';
    var RbdChartCanvas = $('#chartRbd').get(0).getContext('2d')
            var RbdChartData = {
              labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July','Agustus','September','Oktober','November','Desember'],
              datasets: [
                {
                  label: lab,
                  backgroundColor: 'rgba(60,141,188,0.0)',
                  borderColor: 'rgba(60,141,188,0.8)',
                  pointRadius: 2.5,
                  pointBackgroundColor: '#ffffff',
                  pointStrokeColor: 'rgba(108, 185, 60,1)',
                  pointHighlightFill: '#fff',
                  pointHighlightStroke: 'rgba(60,141,188,1)',
                  data:dataGrafik
                }
              ]
            }
              var RbdChartOptions = {
              maintainAspectRatio: false,
              responsive: true,
              legend: {
                display: false
              },
              scales: {
                xAxes: [{
                  gridLines: {
                    display: false
                  }
                }],
                yAxes: [{
                  gridLines: {
                    display: false
                  }
                }]
              }
            }
      
          new Chart(RbdChartCanvas, {
              type: 'line',
              data: RbdChartData,
              options: RbdChartOptions
            })

    //Rasio Pegawai Pelanggan
  //   $.ajax({
  //     url: '/raspegawai',
  //     method: 'GET',
  //     success: function (response) {
  //         // Tampilkan hasil di elemen HTML
  //         $('#hasilRaspeg').text(response.hasilRaspeg + '%');
  //         $('#nilaiRaspeg').text(response.nilaiRaspeg + '/5');
  //         $('#colRaspeg').addClass(response.cls)

  //         //pelanggan
  //       var donutPelangganCanvas = $('#pelanggan').get(0).getContext('2d');
  //       var valuePelanggan = response.hasilRaspeg; // The value you want to show (e.g., 50%)
  //       var remainingPelanggan = 100 - valuePelanggan; // The remaining percentage to make it 100%

  //       var pelangganData = {
  //         labels: ['Completed', 'Remaining'],
  //         datasets: [{
  //           data: [valuePelanggan, remainingPelanggan], // Your value and the remaining percentage
  //           backgroundColor: ['#f1c40f', '#d2d6de'], // Color for the value and the remaining part
  //         }]
  //       };

  //       var pelangganOptions = {
  //         maintainAspectRatio: false,
  //         responsive: true,
  //         cutout: '70%', // This will make it look like a donut (inner circle cutout)
  //         plugins: {
  //           tooltip: {
  //             callbacks: {
  //               label: function(tooltipItem) {
  //                 return tooltipItem.label + ': ' + tooltipItem.raw + '%';
  //               }
  //             }
  //           }
  //         }
  //       };

  //       // Create doughnut chart
  //       new Chart(donutPelangganCanvas, {
  //         type: 'doughnut',
  //         data: pelangganData,
  //         options: pelangganOptions
  //       });

       
  //     },
  //     error: function () {
  //         alert('Terjadi kesalahan saat memuat data.');
  //     }
  //   });
  // $(document).on('click', '#rasioPegawai', function() {
  //   $('#modal-lg').modal('show');
  //   $('#judul').empty();
  //   $('#judul').html('RASIO PEGAWAI TERHADAP PELANGGAN');
  //   kosong();
  //   $('#persen').html('/');
  //   $('#a').html('Jumlah Pagawai');
  //   $('#b').html('(Jumlah Seluruh Pelanggan / 1000 )');
  //   $('#target').html('5')
    
    
  //   $.ajax({
  //     url: '/raspegawai',
  //     type: 'GET',
  //     dataType: 'json',
  //     success: function(response) {
  //         console.log('Data berhasil diterima:', response);
  //         let JmlPgwaiPlgnFormatted = response.JmlPgwai.toLocaleString('id-ID');
  //         let JmlPlgn1000Formatted = response.JmlPlgn1000.toLocaleString('id-ID');
  //         $('#a_nilai').html(JmlPgwaiPlgnFormatted);
  //         $('#b_nilai').html(JmlPlgn1000Formatted);
  //         $('#hasil').html(response.hasilRaspeg +' %');
  //         $('#nilai').html(response.nilaiRaspeg);
  //         
  //         var dataGrafik = urutanBulan.map(bulan => response.persentaseBulanan[bulan]);
  //         var lab = 'Rasio Pegawai';
  //         grafik(dataGrafik,lab);
  //     },
  //     error: function(xhr, status, error) {
  //         console.error('Error:', error);
  //     }
  // })
  // })

  // //Rasio Diklat Pegawai
  // $.ajax({
  //   url: '/rasdiklat',
  //   method: 'GET',
  //   success: function (response) {
        
  //       $('#hasilRasdik').text(response.hasilRasdik + '%');
  //       $('#nilaiRasdik').text(response.nilaiRasdik + '/5');
  //       $('#colRasdik').addClass(response.cls)

         
  //        var donutPegawaiCanvas = $('#pegawai').get(0).getContext('2d');
  //        var valuePegawai = response.hasilRasdik; // The value you want to show (e.g., 50%)
  //        var remainingPegawai = 100 - valuePegawai; // The remaining percentage to make it 100%
 
  //        var pegawaiData = {
  //          labels: ['Completed', 'Remaining'],
  //          datasets: [{
  //            data: [valuePegawai, remainingPegawai], // Your value and the remaining percentage
  //            backgroundColor: ['#3498db', '#d2d6de'], // Color for the value and the remaining part
  //          }]
  //        };
 
  //        var pegawaiOptions = {
  //          maintainAspectRatio: false,
  //          responsive: true,
  //          cutout: '70%', // This will make it look like a donut (inner circle cutout)
  //          plugins: {
  //            tooltip: {
  //              callbacks: {
  //                label: function(tooltipItem) {
  //                  return tooltipItem.label + ': ' + tooltipItem.raw + '%';
  //                }
  //              }
  //            }
  //          }
  //        };
 
  //        // Create doughnut chart
  //        new Chart(donutPegawaiCanvas, {
  //          type: 'doughnut',
  //          data: pegawaiData,
  //          options: pegawaiOptions
  //        });


  //   },
  //   error: function () {
  //       alert('Terjadi kesalahan saat memuat data.');
  //   }
  // });
  // $(document).on('click', '#rasioDiklat', function() {
  //   $('#modal-lg').modal('show');
  //   $('#judul').empty();
  //   $('#judul').html('RASIO DIKLAT PEGAWAI');
  //   kosong();
  //   $('#persen').html('x 100%');
  //   $('#a').html('Jumlah Pagawai Yang Ikut Diklat');
  //   $('#b').html('(Jumlah Pegawai)');
  //   $('#target').html('5');
  //   $.ajax({
  //     url: '/rasdiklat',
  //     type: 'GET',
  //     dataType: 'json',
  //     success: function(response) {
  //         console.log('Data berhasil diterima:', response);
          
  //         $('#a_nilai').html(response.JmlPegDiklat);
  //         $('#b_nilai').html(response.JmlPgwai);
  //         $('#hasil').html(response.hasilRasdik +' %');
  //         $('#nilai').html(response.nilaiRasdik);
  //         
  //         var dataGrafik = urutanBulan.map(bulan => response.persentaseBulanan[bulan]);
  //         var lab = 'Rasio Diklat';
  //         grafik(dataGrafik,lab);
  //     },
  //     error: function(xhr, status, error) {
  //         console.error('Error:', error);
  //     }
  // })
  // })

  // //Rasio Biaya Diklat
  // $.ajax({
  //   url: '/rasbiaya',
  //   method: 'GET',
  //   success: function (response) {
       
  //       $('#hasilRasby').text(response.hasilRasby + '%');
  //       $('#nilaiRasby').text(response.nilaiRasby + '/5');
  //       $('#colRasby').addClass(response.cls)

  //       //diklat
  //       var donutDiklatCanvas = $('#diklat').get(0).getContext('2d');
  //       var valueDiklat = response.hasilRasby;
  //       var remainingDiklat = 100 - valueDiklat;

  //       var diklatData = {
  //         labels: ['Completed', 'Remaining'],
  //         datasets: [{
  //           data: [valueDiklat, remainingDiklat],
  //           backgroundColor: ['#28a745', '#d2d6de'],
  //         }]
  //       };

  //       var diklatOptions = {
  //         maintainAspectRatio: false,
  //         responsive: true,
  //         cutout: '70%', 
  //         plugins: {
  //           tooltip: {
  //             callbacks: {
  //               label: function(tooltipItem) {
  //                 return tooltipItem.label + ': ' + tooltipItem.raw + '%';
  //               }
  //             }
  //           }
  //         }
  //       };

  //       // Create doughnut chart
  //       new Chart(donutDiklatCanvas, {
  //         type: 'doughnut',
  //         data: diklatData,
  //         options: diklatOptions
  //       });
  //   },
  //   error: function () {
  //       alert('Terjadi kesalahan saat memuat data.');
  //   }
  // });
  // $(document).on('click', '#rasioBiaya', function() {
  //   $('#modal-lg').modal('show');
  //   $('#judul').empty();
  //   $('#judul').html('RASIO BIAYA DIKLAT');
  //   kosong();
  //   $('#persen').html('x 100%');
  //   $('#a').html('Realisasi Biaya Diklat');
  //   $('#b').html('Realisasi Biaya Pegawai');
  //   $('#target').html('5')
   
    
    
  //   $.ajax({
  //     url: '/rasbiaya',
  //     type: 'GET',
  //     dataType: 'json',
  //     success: function(response) {
  //         console.log('Data berhasil diterima:', response);
  //         let RealByDiklatFormatted = response.RealByDiklat.toLocaleString('id-ID');
  //         let RealByPegFormatted = response.RealByPeg.toLocaleString('id-ID');
  //         $('#a_nilai').html(RealByDiklatFormatted);
  //         $('#b_nilai').html(RealByPegFormatted);
  //         $('#hasil').html(response.hasilRasby +' %');
  //         $('#nilai').html(response.nilaiRasby);
  //         
  //         var dataGrafik = urutanBulan.map(bulan => response.persentaseBulanan[bulan]);
  //         var lab = 'Rasio Biaya';
  //         grafik(dataGrafik,lab);
  //     },
  //     error: function(xhr, status, error) {
  //         console.error('Error:', error);
  //     }
  // })
    
  // })





  //SDM
        

         
})