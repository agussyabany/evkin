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

   
        var donutPelangganCanvas = $('#pelanggan').get(0).getContext('2d');
        var valuePelanggan = window.dataRplChart; // The value you want to show (e.g., 50%)
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

        
        
        //Rdp

        var donutPegawaiCanvas = $('#pegawai').get(0).getContext('2d');
        var valuePegawai = window.dataRdpChart; // The value you want to show (e.g., 50%)
        var remainingPegawai = 100 - valuePegawai; // The remaining percentage to make it 100%

        var PegawaiData = {
          labels: ['Completed', 'Remaining'],
          datasets: [{
            data: [valuePegawai, remainingPegawai], // Your value and the remaining percentage
            backgroundColor: ['#f1c40f', '#d2d6de'], // Color for the value and the remaining part
          }]
        };

        var PegawaiOptions = {
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
          data: PegawaiData,
          options: PegawaiOptions
        });
})