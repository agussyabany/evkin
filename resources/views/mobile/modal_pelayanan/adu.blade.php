<div class="modal fade" id="modal-adu" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-xl modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="text-center" id="judul">PENYELSAIAN ADUAN
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body" id="body">
          <div class="card">
              <div class="card-body box-profile">
  
                    <div class="row">
                      <div class="col">
                        <table border="1" cellpadding="10" cellspacing="0" style="width: 100%; border-collapse: collapse;">
                          
                          <tr>
                              <td id="a">Pengaduan Selesai Ditangani</td>
                              <td id="a_nilai" style="text-align: right; text-size-adjust: 10px;">{{ number_format( $AduanSlsai, 0)}}</td>
                              <td rowspan="2" class="text-center mt-2" id="persen" style="width: 100%; text-align: center;">X 100 %</td>
                          </tr>
                          <tr>
                              <td id="b">Jumlah Pengaduan</td>
                              <td id="b_nilai" style="text-align: right;">{{number_format ($JmlAduan, 0)}}</td>
                          </tr>
                       </table>
  
                      </div>
                      <div class="col">
                        <table class="table table-striped text-center">
                          <thead>
                            <tr>
                              <th><h4>HASIL</th>
                              <th><h4>NILAI</th>
                              <th><h4>NILAI MAKSIMAL</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td id="hasil"><h4>{{ $hasilAdu }} %</td>
                              <td id="nilai"><h4>{{ $nilaiAdu}}</td>
                              <td id="target"><h4>5</td>
                            </tr>
                            
                          </tbody>
                        </table>
                        
                      </div>
                    </div><br>
  
                    <canvas id="chartAdu" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 443px;" width="443" height="250" class="chartjs-render-monitor"></canvas>
                  </div>
              </div>
          </div>
      </div>
   </div>
  </div>