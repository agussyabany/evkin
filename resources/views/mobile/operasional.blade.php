@extends('layouts.main')

@section('title')
  ASET | DASHBAORAD
@endsection

@section('content')
<div class="content-wrapper">
  <div class="content-header">
    <h1 class="m-0 text-center">OPERASIONAL</h1>
  </div>
  <div class="container">
    <div class="p-1 flex-fill" style="overflow: hidden"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>

                    <div class="row">
                      <div class="col">
                        <!-- MAP -->
                          <a href="#" id="rasioProd"><div id="colRasioProd" class="info-box">
                            <span class="info-box-icon"><i class="fa fa-cogs"></i></span>
              
                            <div class="info-box-content">
                              <span class="">Rasio Produksi</span>
                              <span class="info-box-number" id="rasioProduksi">93,76%</span>
                            </div>

                            <div class="info-box-text  mr-3 ml-2 mt-3"><h3 class="text-center" id="nilaiRasioProd"></h3></div>
                            <!-- /.info-box-content -->
                          </div>
                        </div></a>
                       
                        <div class="col">
                              <!-- /.info-box -->
                          <a href="#" id="nrw"><div id="colNrw" class="info-box">
                            <span class="info-box-icon"><i class="fa fa-tint"></i></span>
              
                            <div class="info-box-content">
                              <span class="">Kehilangan Air</span>
                              <span class="" id="kehilangan">39,54%</span>
                            </div>
                            <!-- /.info-box-content -->
                            <div class="info-box-text  mr-3 ml-2 mt-3"><h3 id="kehilnganNilai" class="text-center"></h3></div>
                        </div></a>
                      </div>

                      
                    </div>

                    <div class="row">
                      <div class="col">
                        <!-- /.info-box -->
                      <a href="#" id="jam"><div id="colJam" class="info-box">
                        <span class="info-box-icon"><i class="fas fa-clock"></i></span>
          
                        <div class="info-box-content">
                          <span class="">Jam Operasi Layanan (jam/hari)</span>
                          <span class="" id="jamOperasi">23,50 Jam</span>
                        </div>
                        <!-- /.info-box-content -->
                        <div class="info-box-text  mr-3 ml-2 mt-3"><h3 class="text-center" id="jamNilai"></h3></div>
                      </div></a>
                    </div>

                    <div class="col">
                      <!-- /.info-box -->
                    <a href="#" id="tekanan">
                      <div id="coltekanan" class="info-box">
                      <span class="info-box-icon"><i class="fas fa-tachometer-alt"></i></span>
        
                      <div class="info-box-content">
                        <span class="">Tekanan Air Pada SL</span>
                        <span class="tekananHasil" id="">95,95%</span>
                      </div>
                      <!-- /.info-box-content -->
                      <div class="info-box-text  mr-3 ml-2 mt-3" ><h3 id="tekananNilai" class="text-center">5/5</h3></div>
                    </div></a>
                    <!-- /.info-box -->

                </div>



                    </div>

                     <div class="row">
                      

                            <div class="col">
                              <!-- /.info-box -->
                            <a href="#" id="kalibrasi"><div id="colkalibarasi" class="info-box">
                              <span class="info-box-icon"><i class="fa fa-thermometer-quarter"></i></span>
                
                              <div class="info-box-content">
                                <span class="" >Penggantian / Kalibarasi Meter Air</span>
                                <span class="" id="kalibarasiHasil">5,02%</span>
                              </div>
                              <!-- /.info-box-content -->
                              <div class="info-box-text  mr-3 ml-2 mt-3"><h3 id="kalibarasiNilai" class="text-center"></h3></div>
                            </div></a>
                            <!-- /.info-box -->

                        </div>
                     </div>

                     <div class="row">
                        <div class="col">

                        </div>

                        <div class="col">
                          
                        </div>
                     </div>

                    </div>
  </div>
</div><br>
@endsection
