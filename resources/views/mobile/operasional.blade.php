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
                          <a href="#" id="rasioProd"><div class="info-box  bg-success">
                            <span class="info-box-icon"><i class="fa fa-cogs"></i></span>
              
                            <div class="info-box-content">
                              <span class="">Rasio Produksi</span>
                              <span class="info-box-number">93,76%</span>
                            </div>

                            <div class="info-box-text  mr-3 ml-2 mt-3"><h3 class="text-center">5/5</h3></div>
                            <!-- /.info-box-content -->
                          </div>
                        </div></a>
                       
                        <div class="col">
                              <!-- /.info-box -->
                          <a href="#" id="nrw"><div class="info-box  bg-danger">
                            <span class="info-box-icon"><i class="fa fa-tint"></i></span>
              
                            <div class="info-box-content">
                              <span class="">Kehilangan Air</span>
                              <span class="">39,54%</span>
                            </div>
                            <!-- /.info-box-content -->
                            <div class="info-box-text  mr-3 ml-2 mt-3"><h3 class="text-center">2/5</h3></div>
                        </div></a>
                      </div>

                      
                    </div>

                    <div class="row">
                      <div class="col">
                        <!-- /.info-box -->
                      <a href="#" id="jam"><div class="info-box bg-success">
                        <span class="info-box-icon"><i class="fas fa-clock"></i></span>
          
                        <div class="info-box-content">
                          <span class="">Jam Operasi Layanan (jam/hari)</span>
                          <span class="">23,50 Jam</span>
                        </div>
                        <!-- /.info-box-content -->
                        <div class="info-box-text  mr-3 ml-2 mt-3"><h3 class="text-center">5/5</h3></div>
                      </div></a>
                    </div>

                    <div class="col">
                      <!-- /.info-box -->
                    <a href="#" id="tekanan"><div class="info-box  bg-success">
                      <span class="info-box-icon"><i class="fas fa-tachometer-alt"></i></span>
        
                      <div class="info-box-content">
                        <span class="">Tekanan Air Pada SL</span>
                        <span class="">95,95%</span>
                      </div>
                      <!-- /.info-box-content -->
                      <div class="info-box-text  mr-3 ml-2 mt-3"><h3 class="text-center">5/5</h3></div>
                    </div></a>
                    <!-- /.info-box -->

                </div>



                    </div>

                     <div class="row">
                      

                            <div class="col">
                              <!-- /.info-box -->
                            <a href="#" id="kalibrasi"><div class="info-box  bg-danger">
                              <span class="info-box-icon"><i class="fa fa-thermometer-quarter"></i></span>
                
                              <div class="info-box-content">
                                <span class="">Penggantian / Kalibarasi Meter Air</span>
                                <span class="">5,02%</span>
                              </div>
                              <!-- /.info-box-content -->
                              <div class="info-box-text  mr-3 ml-2 mt-3"><h3 class="text-center">2 / 5</h3></div>
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
