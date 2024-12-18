@extends('layouts.main')

@section('title')
  ASET | DASHBAORAD
@endsection

@section('content')
<div class="content-wrapper">
  
  <div class="container">

    <div class="row">
      <div class="col-12">
        <!-- jQuery Knob -->
        <div class="card">
          <div class="card-header">
            <h6 class="text-center">
              PERUMDAM TIRTA KENCANA KOTA SAMARINDA TAHUN 2024
            </h6>

          </div>
         
          <div class="card-body">
            <div class="row">
              
              <a href="#" id="nrw" style="text-decoration: none;"><div class="col" >
                <input type="number" class="knob"  value="38" data-width="90" data-readonly="true" data-height="90" data-fgColor="#f56954"  disabled>

                <div class="knob-label text-center">NRW (%)</div>
              </div></a>
              
              <a href="#" id="cakup"><div class="col">
                <input type="text" class="knob" value="83" data-width="90" data-readonly="true" data-height="90" data-fgColor="#00a65a" disabled>
                  <div class="knob-label text-center">CAKUPAN (%)</div>
              </div></a>
              
              <a href="#" id="laba"><div class="col">
                <input type="text" class="knob" value="" data-width="90" data-readonly="true" data-height="90" data-width="90" data-height="90" data-fgColor="#00a65a" disabled>

                <div class="knob-label text-center">LABA  (Miliar) </div>
              </div></a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <table class="table table-bordered">
      <thead>
        <tr>
          <th class="text-center">KATEGORI</th>
          <th class="text-center">KINERJA</th>
         
        </tr>
      </thead>
      <tbody>
        <tr>
          <td class="text-center">Sehat</td>
          <td class="text-center">Baik</td>
        </tr>
        
      </tbody>
    </table>


    <a href="/mKeuangan"><div class="info-box  bg-primary">
      <span class="info-box-icon"><i class="fas fa-money-bill"></i></span>

      <div class="info-box-content">
        <span class=""><h3>KEUANGAN</h3></span>
        <span class="info-box-number"></span>
      </div>

      <div class="info-box-text  mr-3 ml-2 mt-3"><h3 class="text-center"></h3></div>
      <!-- /.info-box-content -->
    </div></a>
    <a href="/mOperasional"><div class="info-box bg-success">
      <span class="info-box-icon"><i class="fas fa-cogs"></i></span>

      <div class="info-box-content">
        <span class=""><h3>OPERASIONAL</h3></span>
        <span class=""></span>
      </div>
      <!-- /.info-box-content -->
      <div class="info-box-text  mr-3 ml-2 mt-3"><h3 class="text-center"></h3></div>
    </div></a>
    <a href="/mPelayanan"><div class="info-box bg-info">
      <span class="info-box-icon"><i class="fas fa-handshake"></i></span>

      <div class="info-box-content">
        <span class=""><h3>PELAYANAN</h3></span>
        <span class=""></span>
      </div>
      <!-- /.info-box-content -->
      <div class="info-box-text  mr-3 ml-2 mt-3"><h3 class="text-center"></h3></div>
    </div></a>
    <a href="/mSdmkin"><div class="info-box  bg-warning">
      <span class="info-box-icon"><i class="fas fa-users"></i></span>

      <div class="info-box-content">
        <span class=""><h3>SDM</h3></span>
        <span class=""></span>
      </div>
      <!-- /.info-box-content -->
      <div class="info-box-text  mr-3 ml-2 mt-3"><h3 class="text-center"></h3></div>
  </div></a>

  <a href="#"><div class="info-box  bg-danger">
      <span class="info-box-icon"><i class="fas fa-edit"></i></span>

      <div class="info-box-content">
        <span class=""><h3>ADMINISTRASI</h3></span>
        <span class=""></span>
      </div>
      <!-- /.info-box-content -->
      <div class="info-box-text  mr-3 ml-2 mt-3"><h3 class="text-center"></h3></div>
  </div></a>
  
  <br>
  </div>
</div>

<div class="modal fade" id="modal-laba" aria-hidden="true" style="display: none;">
  <div class="modal-dialog modal-xl modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="text-center" id="judulLaba">Large Modal</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body" id="body">
        <div class="card">
            <div class="card-body box-profile">

                  <div class="row">
                    <div class="col">
                      <h3 class="text-center"></h3>

                    </div>
                    
                      <table class="table table-striped text-center">
                        <thead>
                          <tr>
                            
                            <th>BULAN</th>
                            <th>NILAI</th>
                          </tr>
                        </thead>
                        <tbody>
                        
                          <tr>
                            <td id=""></td>
                            <td id=""></td>
                          </tr>
                         
                        </tbody>
                      </table>
                      
                    
                  </div><br>

                  <canvas id="" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 443px;" width="443" height="250" class="chartjs-render-monitor"></canvas>
                </div>
            </div>
        </div>
    </div>
 </div>
</div>
@endsection
