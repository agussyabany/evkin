function kosong()
  {
    $('#a').empty;
    $('#a_nilai').empty;
    $('#b').empty;
    $('#b_nilai').empty;
  }

function grafik(dataGrafik)
{
  var nrwChartCanvas = $('#chartKinerja').get(0).getContext('2d')
            var nrwChartData = {
              labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July','Agustus','September','Oktober','November','Desember'],
              datasets: [
                {
                  label: 'CAKUPAN LAYANAN',
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
              var nrwChartOptions = {
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
      
          new Chart(nrwChartCanvas, {
              type: 'line',
              data: nrwChartData,
              options: nrwChartOptions
            })
}