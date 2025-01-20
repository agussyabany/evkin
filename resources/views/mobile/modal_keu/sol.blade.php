<div class="modal fade" id="modal-sol" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-xl modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="text-center" id="judul">SOLVABILITAS
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
                              <td id="a">Total Aktiva</td>
                              <td id="a_nilai" style="text-align: right; text-size-adjust: 10px;">{{ number_format( $TotalAktiva, 0)}}</td>
                              <td rowspan="2" class="text-center mt-2" id="persen" style="width: 100%; text-align: center;">X 100 %</td>
                          </tr>
                          <tr>
                              <td id="b">Total Hutang</td>
                              <td id="b_nilai" style="text-align: right;">{{number_format ($TotalHutang, 0)}}</td>
                          </tr>
                       </table>
  
                      </div>
                      <div class="col">
                        <table class="table table-striped text-center">
                          <thead>
                            <tr>
                              <th>HASIL</th>
                              <th>NILAI</th>
                              <th>NILAI MAKSIMAL</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td id="hasil">{{ $hasilSol}} %</td>
                              <td id="nilai">{{ $nilaiSol}}</td>
                              <td id="target">5</td>
                            </tr>
                            
                          </tbody>
                        </table>
                        
                      </div>
                    </div><br>
  
                    <canvas id="chartSol" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 443px;" width="443" height="250" class="chartjs-render-monitor"></canvas>
                  </div>
              </div>
          </div>
      </div>
   </div>
  </div>