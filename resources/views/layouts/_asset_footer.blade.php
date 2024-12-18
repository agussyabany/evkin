<div class="modal fade" id="modal-lg" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-xl modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="text-center" id="judul">Large Modal</h4>
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
                              <td id="a"><h2>NAMA OBJECT 1</h2></td>
                              <td id="a_nilai" style="text-align: right; text-size-adjust: 10px;"><h2>1000.000</h2></td>
                              <td rowspan="2" class="text-center mt-2" id="persen" style="width: 100%; text-align: center;"></td>
                          </tr>
                          <tr>
                              <td id="b"><h2>NAMA OBJECT 2</h2></td>
                              <td id="b_nilai" style="text-align: right;"><h2>2000.000</h2></td>
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
                              <td id="hasil"><h4>2,90 %</h4></td>
                              <td id="nilai"><h4>5</h4></td>
                              <td id="target"><h4>2</h4></td>
                            </tr>
                            
                          </tbody>
                        </table>
                        
                      </div>
                    </div><br>
  
                    <canvas id="chartKinerja" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 443px;" width="443" height="250" class="chartjs-render-monitor"></canvas>
                  </div>
              </div>
          </div>
      </div>
   </div>
  </div>

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap -->
<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('assets/dist/js/adminlte.js') }}"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="{{ asset('assets/plugins/jquery-mousewheel/jquery.mousewheel.js')}}"></script>
<script src="{{ asset('assets/plugins/raphael/raphael.min.js')}}"></script>
<script src="{{ asset('assets/plugins/jquery-mapael/jquery.mapael.min.js') }}"></script>
<script src="{{ asset('assets/plugins/jquery-mapael/maps/usa_states.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('assets/plugins/chart.js/Chart.min.js') }}"></script>
<script src="{{ asset('assets/plugins/jquery-knob/jquery.knob.min.js')}}"></script>

<!-- AdminLTE for demo purposes -->
{{-- <script src="{{ asset('assets/dist/js/demo.js')}}"></script> --}}
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('assets/dist/js/pages/dashboard2.js')}}"></script>
<script src="{{ asset('assets/dist/js/utama/pp.js')}}"></script>
<script src="{{ asset('assets/dist/js/umum/keuangan.js')}}"></script>
<script src="{{ asset('assets/dist/js/pelayanan/pelayanan.js')}}"></script>
<script src="{{ asset('assets/dist/js/operasional/operasional.js')}}"></script>
<script src="{{ asset('assets/dist/js/umum/sdm.js')}}"></script>
<script src="{{ asset('assets/dist/js/dashboard/sdm.js')}}"></script>
<script src="{{ asset('assets/dist/js/dashboard/home.js')}}"></script>
<script src="{{ asset('assets/dist/js/dashboard/keuangan.js')}}"></script>
<script src="{{ asset('assets/dist/js/dashboard/operasional.js')}}"></script>
<script src="{{ asset('assets/dist/js/dashboard/pelayanan.js')}}"></script>
<script src="{{ asset('assets/dist/js/dashboard/adm.js')}}"></script>
<script src="{{ asset('assets/dist/js/dashboard/fungsi.js')}}"></script>

