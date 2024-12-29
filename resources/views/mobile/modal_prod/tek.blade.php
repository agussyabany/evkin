<div class="modal fade" id="modal-tek" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-xl modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="text-center" id="judul">TEKANAN AIR PADA PELANGGAN</h4>
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
                              <td id="a">Jumlah Pelanggan yang Dilayanai dengan Tekanan > 0,7 Bar</h2></td>
                              <td id="a_nilai" style="text-align: right; text-size-adjust: 10px;">{{ number_format( $Plgnlayan, 0)}}</h2></td>
                              <td rowspan="2" class="text-center mt-2" id="persen" style="width: 100%; text-align: center;">X 100 %</h2></td>
                          </tr>
                          <tr>
                              <td id="b">Jumlah Pelanggan Aktiv</h2></td>
                              <td id="b_nilai" style="text-align: right;">{{number_format ($PlgnAktiv, 0)}}</h2></td>
                          </tr>
                       </table>
  
                      </div>
                      <div class="col">
                        <table class="table table-striped text-center">
                          <thead>
                            <tr>
                              <th>HASIL</h4></th>
                              <th>NILAI</h4></th>
                              <th>TARGET</h4></th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td id="hasil">{{ $tekanan}} %</h4></td>
                              <td id="nilai">{{ $nilaiTek}}</h4></td>
                              <td id="target">5</h4></td>
                            </tr>
                            
                          </tbody>
                        </table>
                        
                      </div>
                    </div><br>
  
                    <canvas id="chartTek" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 443px;" width="443" height="250" class="chartjs-render-monitor"></canvas>
                  </div>
              </div>
          </div>
      </div>
   </div>
  </div>