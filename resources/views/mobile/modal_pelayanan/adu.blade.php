<div class="modal fade" id="modal-adu" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-xl modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="text-center" id="judul">PENYELSAIAN ADUAN</h4>
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
                              <td id="a"><h2>Pengaduan Selesai Ditangani</h2></td>
                              <td id="a_nilai" style="text-align: right; text-size-adjust: 10px;"><h2>{{ number_format( $AduanSlsai, 0)}}</h2></td>
                              <td rowspan="2" class="text-center mt-2" id="persen" style="width: 100%; text-align: center;"><h2>X 100 %</h2></td>
                          </tr>
                          <tr>
                              <td id="b"><h2>Jumlah Pengaduan</h2></td>
                              <td id="b_nilai" style="text-align: right;"><h2>{{number_format ($JmlAduan, 0)}}</h2></td>
                          </tr>
                       </table>
  
                      </div>
                      <div class="col">
                        <table class="table table-striped text-center">
                          <thead>
                            <tr>
                              <th><h4>HASIL</h4></th>
                              <th><h4>NILAI</h4></th>
                              <th><h4>TARGET</h4></th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td id="hasil"><h4>{{ $hasilAdu }} %</h4></td>
                              <td id="nilai"><h4>{{ $nilaiAdu}}</h4></td>
                              <td id="target"><h4>5</h4></td>
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