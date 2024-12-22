$(document).ready(function() {

// //Rasio Produksi

var dataProd = window.dataProd
    var urutanBulan = ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'];
    var dataGrafik = urutanBulan.map(bulan => dataProd[bulan]);
    var lab = 'Prod';
    var ProdChartCanvas = $('#chartProd').get(0).getContext('2d')
            var ProdChartData = {
              labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July','Agustus','September','Oktober','November','Desember'],
              datasets: [
                {
                  label: lab,
                  backgroundColor: 'rgba(60,141,188,0.9)',
                  borderColor: 'rgba(60,141,188,0.8)',
                  pointRadius: true,
                  pointColor: '#ffffff',
                  pointStrokeColor: 'rgba(108, 185, 60,1)',
                  pointHighlightFill: '#fff',
                  pointHighlightStroke: 'rgba(60,141,188,1)',
                  data:dataGrafik
                }
              ]
            }
              var ProdChartOptions = {
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
      
          new Chart(ProdChartCanvas, {
              type: 'line',
              data: ProdChartData,
              options: ProdChartOptions
            })

// NRW
var dataNrw = window.dataNrw
    var urutanBulan = ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'];
    var dataGrafik = urutanBulan.map(bulan => dataNrw[bulan]);
    var lab = 'Prod';
    var NrwChartCanvas = $('#chartNrw').get(0).getContext('2d')
            var NrwChartData = {
              labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July','Agustus','September','Oktober','November','Desember'],
              datasets: [
                {
                  label: lab,
                  backgroundColor: 'rgba(60,141,188,0.9)',
                  borderColor: 'rgba(60,141,188,0.8)',
                  pointRadius: true,
                  pointColor: '#ffffff',
                  pointStrokeColor: 'rgba(108, 185, 60,1)',
                  pointHighlightFill: '#fff',
                  pointHighlightStroke: 'rgba(60,141,188,1)',
                  data:dataGrafik
                }
              ]
            }
              var NrwChartOptions = {
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
      
          new Chart(NrwChartCanvas, {
              type: 'line',
              data: NrwChartData,
              options: NrwChartOptions
            })

//JAM
var dataJam = window.dataJam
    var urutanBulan = ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'];
    var dataGrafik = urutanBulan.map(bulan => dataJam[bulan]);
    var lab = 'Jam Layanan';
    var JamChartCanvas = $('#chartJam').get(0).getContext('2d')
            var JamChartData = {
              labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July','Agustus','September','Oktober','November','Desember'],
              datasets: [
                {
                  label: lab,
                  backgroundColor: 'rgba(60,141,188,0.9)',
                  borderColor: 'rgba(60,141,188,0.8)',
                  pointRadius: true,
                  pointColor: '#ffffff',
                  pointStrokeColor: 'rgba(108, 185, 60,1)',
                  pointHighlightFill: '#fff',
                  pointHighlightStroke: 'rgba(60,141,188,1)',
                  data:dataGrafik
                }
              ]
            }
              var JamChartOptions = {
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
      
          new Chart(JamChartCanvas, {
              type: 'line',
              data: JamChartData,
              options: JamChartOptions
            })

//TEKANAN PELANGGAN
var dataTek = window.dataTek
    var urutanBulan = ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'];
    var dataGrafik = urutanBulan.map(bulan => dataTek[bulan]);
    var lab = 'Tekanan';
    var TekChartCanvas = $('#chartTek').get(0).getContext('2d')
            var TekChartData = {
              labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July','Agustus','September','Oktober','November','Desember'],
              datasets: [
                {
                  label: lab,
                  backgroundColor: 'rgba(60,141,188,0.9)',
                  borderColor: 'rgba(60,141,188,0.8)',
                  pointRadius: true,
                  pointColor: '#ffffff',
                  pointStrokeColor: 'rgba(108, 185, 60,1)',
                  pointHighlightFill: '#fff',
                  pointHighlightStroke: 'rgba(60,141,188,1)',
                  data:dataGrafik
                }
              ]
            }
              var TekChartOptions = {
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
      
          new Chart(TekChartCanvas, {
              type: 'line',
              data: TekChartData,
              options: TekChartOptions
            })

//KALIBRASI
var dataKal = window.dataKal
    var urutanBulan = ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'];
    var dataGrafik = urutanBulan.map(bulan => dataKal[bulan]);
    var lab = 'Kalibrasi';
    var KalChartCanvas = $('#chartKal').get(0).getContext('2d')
            var KalChartData = {
              labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July','Agustus','September','Oktober','November','Desember'],
              datasets: [
                {
                  label: lab,
                  backgroundColor: 'rgba(60,141,188,0.9)',
                  borderColor: 'rgba(60,141,188,0.8)',
                  pointRadius: true,
                  pointColor: '#ffffff',
                  pointStrokeColor: 'rgba(108, 185, 60,1)',
                  pointHighlightFill: '#fff',
                  pointHighlightStroke: 'rgba(60,141,188,1)',
                  data:dataGrafik
                }
              ]
            }
              var KalChartOptions = {
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
      
          new Chart(KalChartCanvas, {
              type: 'line',
              data: KalChartData,
              options: KalChartOptions
            })

//   $.ajax({
//     url: '/rasProd',
//     method: 'GET',
//     success: function (response) {
//         // Tampilkan hasil di elemen HTML
//         $('#rasioProduksi').text(response.rasioProd + '%');
//         $('#nilaiRasioProd').text(response.nilaiProd + '/5');
//         $('#colRasioProd').addClass(response.cls)
//     },
//     error: function () {
//         alert('Terjadi kesalahan saat memuat data.');
//     }
// });
// //Rasio Produksi Modal
//   $(document).on('click', '#rasioProd', function() {
//     $('#modal-lg').modal('show');
//     $('#judul').empty();
//     $('#chartKinerja').empty();
//     $('#judul').html('RASIO PRODUKSI');
//     kosong();
//     $('#persen').html('X 100 %');
//     $('#a').html('Volume Produksi Riil');
//     $('#b').html('Jumlah Kapasitas Terpasang');
//     $('#target').html('5')

//     $.ajax({
//       url: '/rasProd',
//       method: 'GET',
//       success: function (response) {
//         let VolProdRilFormatted = response.VolProdRil.toLocaleString('id-ID');
//         let KpstsTrpsngFormatted = response.KpstsTrpsng.toLocaleString('id-ID');
//         $('#a_nilai').html(VolProdRilFormatted);
//         $('#b_nilai').html(KpstsTrpsngFormatted);
//         $('#hasil').html(response.rasioProd + '%');
//         $('#nilai').html(response.nilaiProd);
//         var urutanBulan = ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'];
//         var dataGrafik = urutanBulan.map(bulan => response.persentaseBulanan[bulan]);
//         var lab = 'Rasio Produksi';
//         grafik(dataGrafik,lab);

//       },
//       error: function () {
//           alert('Terjadi kesalahan saat memuat data.');
//       }
//   });


//   })

//   //Kehilangan Air
//   $.ajax({
//     url: '/nrw',
//     method: 'GET',
//     success: function (response) {
//         // Tampilkan hasil di elemen HTML
//         $('#kehilangan').text(response.nrw + '%');
//         $('#kehilnganNilai').text(response.nilaiNrw + '/4');
//         $('#colNrw').addClass(response.cls)
//         $('#homeNRW').val(response.nrw);
//     },
//     error: function () {
//         alert('Terjadi kesalahan saat memuat data.');
//     }
// });
//   $(document).on('click', '#nrw', function() {
//     $('#modal-lg').modal('show');
//     $('#judul').empty();
//     $('#chartKinerja').empty();
//     $('#judul').html('KEHILANGAN AIR');
//     kosong();
//     $('#persen').html('X 100 %');
//     $('#a').html('Air Disistribusikan - Air Terjual');
//     $('#b').html('Jumlah Air Didistribusikan');
   
//     $('#nilai').html('2');
//     $('#target').html('5')
//     $.ajax({
//           url: '/nrw',
//           type: 'GET',
//           dataType: 'json',
//           success: function(data) {
//               console.log('Data berhasil diterima:', data);
//               let KalkulasiJumAirFormatted = (data.KalkulasiJumAir).toLocaleString('id-ID');
//               let JmlAirDistFormatted = data.JmlAirDist.toLocaleString('id-ID');
//               $('#a_nilai').html(KalkulasiJumAirFormatted);
//               $('#b_nilai').html(JmlAirDistFormatted);
//               $('#hasil').html(data.nilaiNrw +'%');
              
//               $('#nilai').html(data.nilaiNrw);
//               var urutanBulan = ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'];
//               var dataGrafik = urutanBulan.map(bulan => data.persentaseBulanan[bulan]);
//               console.log(dataGrafik)
//               var lab = 'NRW';
//               grafik(dataGrafik,lab);
//           },
//           error: function(xhr, status, error) {
//               console.error('Error:', error);
//           }
//       })
      

     
//   })

//   //Jam Operasonal
//   $.ajax({
//     url: '/jam',
//     method: 'GET',
//     success: function (response) {
//         // Tampilkan hasil di elemen HTML
//         $('#jamOperasi').text(response.jam + 'jam');
//         $('#jamNilai').text(response.nilaiJam + '/5');
//         $('#colJam').addClass(response.cls);
//     },
//     error: function () {
//         alert('Terjadi kesalahan saat memuat data.');
//     }
// });

//   $(document).on('click', '#jam', function() {
//     $('#modal-lg').modal('show');
//     $('#judul').empty();
//     $('#chartKinerja').empty();
//     $('#judul').html('JAM OPERASI LAYANAN');
//     kosong();
//     $('#persen').html('/');
//     $('#a').html('Jumlah Waktu Pelayanan/Distribusi Air ke Pelanggan dalam Setahun');
//     $('#b').html('Jumlah Hari');
//     $('#target').html('5');

//     $.ajax({
//       url: '/jam',
//       type: 'GET',
//       dataType: 'json',
//       success: function(data) {
//           console.log('Data berhasil diterima:', data);
          
//           $('#a_nilai').html(data.JmlWktPly);
//           $('#b_nilai').html('360');
//           $('#hasil').html(data.jam +' Jam');
//           $('#nilai').html(data.nilaiJam);
//           var urutanBulan = ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'];
//           var dataGrafik = urutanBulan.map(bulan => data.persentaseBulanan[bulan]);
//           console.log(dataGrafik)
//           var lab = 'JAM';
//           grafik(dataGrafik,lab);
//       },
//       error: function(xhr, status, error) {
//           console.error('Error:', error);
//       }
//   })
//   })

//   //Tekanan Air Pada SL
//   $.ajax({
//     url: '/tekanan',
//     method: 'GET',
//     success: function (response) {
//         // Tampilkan hasil di elemen HTML
//         $('#tekananHasil').text(response.tekanan + '%');
//         $('#tekananNilai').text(response.nilaiTekanan + '/ 5');
//         $('#coltekanan').addClass(response.cls);
//     },
//     error: function () {
//         alert('Terjadi kesalahan saat memuat data.');
//     }
// });
//   $(document).on('click', '#tekanan', function() {
//     $('#modal-lg').modal('show');
//     $('#judul').empty();
//     $('#judul').html('TEKANAN AIR PADA SR');
//     $('#chartKinerja').empty();
//     kosong();
//     $('#persen').html('x 100%');
//     $('#a').html('Jumlah Pelanggan yang Dilayanai dengan Tekanan > 0,7 Bar');
//     $('#b').html('Jumlah Pelanggan Aktiv');
        
//     $.ajax({
//       url: '/tekanan',
//       type: 'GET',
//       dataType: 'json',
//       success: function(data) {
//           console.log('Data berhasil diterima:', data);
//           let PlgnlayanFormatted = (data.Plgnlayan).toLocaleString('id-ID');
//           let PlgnAktivFormatted = data.PlgnAktiv.toLocaleString('id-ID');
          
//           $('#a_nilai').html(PlgnlayanFormatted);
//           $('#b_nilai').html(PlgnAktivFormatted);
//           $('#hasil').html(data.tekanan +' %');
//           $('#nilai').html(data.nilaiTekanan);
//           var urutanBulan = ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'];
//           var dataGrafik = urutanBulan.map(bulan => data.persentaseBulanan[bulan]);
//           console.log(dataGrafik)
//           var lab = 'Tekanan';
//           grafik(dataGrafik,lab);
//       },
//       error: function(xhr, status, error) {
//           console.error('Error:', error);
//       }
//   })
//   })

//   //Kalibrasi
//   $.ajax({
//     url: '/kalibrasi',
//     method: 'GET',
//     success: function (response) {
//         // Tampilkan hasil di elemen HTML
//         $('#kalibarasiHasil').text(response.tekanan);
//         $('#kalibarasiNilai').text(response.nilaiKalibrasi + '/ 5');
//         $('#colkalibarasi').addClass(response.cls);
//     },
//     error: function () {
//         alert('Terjadi kesalahan saat memuat data.');
//     }
// });

//   $(document).on('click', '#kalibrasi', function() {
//     $('#modal-lg').modal('show');
//     $('#judul').empty();
//     $('#chartKinerja').empty();
//     $('#judul').html('PENGGANTIAN / KALIBRASI METER AIR');
//     kosong();
//     $('#persen').html('X 100 %');
//     $('#a').html('Jml Meter yg diganti/kalibrasi dalam setahun');
//     $('#b').html('Jumlah Pelanggan Aktif');
//     $('#target').html('5')
//   })

//   $.ajax({
//     url: '/kalibrasi',
//     type: 'GET',
//     dataType: 'json',
//     success: function(data) {
//         console.log('Data berhasil diterima:', data);
//         let MtrAirGntiFormatted = (data.MtrAirGnti).toLocaleString('id-ID');
//         let PlgnAktivFormatted = data.PlgnAktiv.toLocaleString('id-ID');
        
//         $('#a_nilai').html(MtrAirGntiFormatted);
//         $('#b_nilai').html(PlgnAktivFormatted);
//         $('#hasil').html(data.kalibrasi +' %');
//         $('#nilai').html(data.nilaiKalibrasi);

//         var urutanBulan = ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'];
//         var dataGrafik = urutanBulan.map(bulan => data.persentaseBulanan[bulan]);
//         console.log(dataGrafik)
//         var lab = 'Kalibrasi';
//         grafik(dataGrafik,lab);
//     },
//     error: function(xhr, status, error) {
//         console.error('Error:', error);
//     }
// })


})