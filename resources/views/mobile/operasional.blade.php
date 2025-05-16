@extends('layouts.main')

@section('title')
  ASET | DASHBAORAD
@endsection

@section('content')
<div class="content-wrapper">
  <div class="content-header">
    <h1 class="m-0 text-center">ASPEK OPERASIONAL  {{ \App\Helpers\EvkinHelper::namaBulan(session('bulan_awal')) }} s/d {{ \App\Helpers\EvkinHelper::namaBulan(session('bulan_akhir')) }}  {{ session('tahun') }}</h1>
  </div>
  <div class="container">
    <div class="p-1 flex-fill" style="overflow: hidden"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>

                    
                      <div class="col">
                        <!-- MAP -->
                          <a href="#" id="rasioProd" data-toggle="modal" data-target="#modal-prod"><div id="colRasioProd" class="info-box {{$clsProd}}">
                            <span class="info-box-icon"><i class="fa fa-cogs"></i></span>
              
                            <div class="info-box-content">
                              <span class="">Rasio Produksi</span>
                              <span class="info-box-number" id="rasioProduksi">{{$hasilProd}}%</span>
                            </div>

                            <div class="info-box-text  mr-3 ml-2 mt-3"><h3 class="text-center" id="nilaiRasioProd">{{$nilaiProd}} / 5</h3></div>
                            <!-- /.info-box-content -->
                          </div>
                        </div></a>
                       
                        <div class="col">
                              <!-- /.info-box -->
                          <a href="#" id="nrw" data-toggle="modal" data-target="#modal-nrw"><div id="colNrw" class="info-box {{$clsNrw}} ">
                            <span class="info-box-icon"><i class="fa fa-tint"></i></span>
              
                            <div class="info-box-content">
                              <span class="">Kehilangan Air</span>
                              <span class="" id="kehilangan">{{$nrw}}%</span>
                            </div>
                            <!-- /.info-box-content -->
                            <div class="info-box-text  mr-3 ml-2 mt-3"><h3 id="kehilnganNilai" class="text-center">{{$nilaiNrw}} / 5</h3></div>
                        </div></a>
                      </div>

                      
                   

                    
                      <div class="col">
                        <!-- /.info-box -->
                      <a href="#" id="jam" data-toggle="modal" data-target="#modal-jam">
                        <div id="colJam" class="info-box {{$clsJam}}">
                        <span class="info-box-icon"><i class="fas fa-clock"></i></span>
          
                        <div class="info-box-content">
                          <span class="">Jam Operasi Layanan (jam/hari)</span>
                          <span class="" id="jamOperasi">{{$jam}} Jam</span>
                        </div>
                        <!-- /.info-box-content -->
                        <div class="info-box-text  mr-3 ml-2 mt-3"><h3 class="text-center" id="jamNilai">{{$nilaiJam}} /5</h3></div>
                      </div></a>
                    </div>

                    <div class="col">
                      <!-- /.info-box -->
                    <a href="#" id="tekanan" data-toggle="modal" data-target="#modal-tek">
                      <div id="coltekanan" class="info-box {{$clsTek}}">
                      <span class="info-box-icon"><i class="fas fa-tachometer-alt"></i></span>
        
                      <div class="info-box-content">
                        <span class="">Tekanan Air Pada SL</span>
                        <span class="tekananHasil" id="tekananHasil">{{ $tekanan }}</span>
                      </div>
                      <!-- /.info-box-content -->
                      <div class="info-box-text  mr-3 ml-2 mt-3" ><h3 id="tekananNilai" class="text-center">{{ $nilaiTek }}/5</h3></div>
                    </div></a>
                    <!-- /.info-box -->

                </div>

                     
                      

                            <div class="col">
                              <!-- /.info-box -->
                            <a href="#" id="kalibrasi" data-toggle="modal" data-target="#modal-kal"><div id="colkalibarasi" class="info-box {{$clsKal}}">
                              <span class="info-box-icon"><i class="fa fa-thermometer-quarter"></i></span>
                
                              <div class="info-box-content">
                                <span class="" >Penggantian / Kalibarasi Meter Air</span>
                                <span class="" id="kalibarasiHasil">{{$kalibrasi}} %</span>
                              </div>
                              <!-- /.info-box-content -->
                              <div class="info-box-text  mr-3 ml-2 mt-3"><h3 id="kalibarasiNilai" class="text-center">{{$nilaiKal}} / 5</h3></div>
                            </div></a>
                            <!-- /.info-box -->

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

<script>
  
  window.dataProd = @json($persentaseBulananProd);
  window.dataNrw = @json($persentaseBulananNrw);
  window.dataJam = @json($persentaseBulananJam);
  window.dataTek = @json($persentaseBulananTek);
  window.dataKal = @json($persentaseBulananKal);
  window.dataBul = @json($urutanBulan);
  

</script>

@include('mobile.modal_prod.prod')
@include('mobile.modal_prod.nrw')
@include('mobile.modal_prod.jam')
@include('mobile.modal_prod.tek')
@include('mobile.modal_prod.kal')
@include('mobile.bottom.bootm')

@endsection
