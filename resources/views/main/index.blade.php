@extends('layouts.main')

@section('title')
  ASET | DASHBAORAD
@endsection

@section('content')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="m-0 text-center">PERUMDAM TIRTA KENCANA KOTA SAMARINDA <br> DASHBOARD KINERJA TAHUN {{$tahun}}</h1>
          </div><!-- /.col -->
          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <fieldset class=" border border-primary rounded text-center">
          <legend class="ml-2 w-auto px-3 border border-primary rounded"><h5 class="mt-2">PENILAIAN</h5></legend>
        <div class="content ml-2 mr-2">
          <div class="row">
            
          <div class="col">
          <a href="#"><div class="info-box">
             <span class="info-box-icon {{$clsRoe}} elevation-1 d-flex align-items-center justify-content-center">
              <img src="{{ asset('assets/img/bpkp.jpg') }}" alt="ROE" style="width:80px; height:80px; object-fit:contain;">
            </span>
              <div class="info-box-content">

                <div class="row">
                  <div class="col col-md-9">
                    <span class="info-box-text text-center"><h3><strong>BAIK</strong></h3></span>
                      <span class="info-box-number">
                       
                        <small></small>
                      </span>
                    </div>

                  <div class="col border-left">
                    <h3 class="text-center mt-3 ml-2"></h3>
                  </div>
                </div>
                
              </div>
            </div></a>
          </div>

          <div class="col">
            <a href="#"><div class="info-box mb-3">
              <span class="info-box-icon {{$clsRoe}} elevation-1 d-flex align-items-center justify-content-center">
              <img src="{{ asset('assets/img/pu.png') }}" alt="ROE" style="width:80px; height:80px; object-fit:contain;">
            </span>

              <div class="info-box-content">
                <div class="row">
                  <div class="col col-md-9">
                    <span class="info-box-text"><h3><strong>SEHAT</strong></h3></span>
                      {{-- <span class="info-box-number">{{$hasilRop}}
                        <small>%</small>
                      </span> --}}
                    </div>

                    {{-- <div class="col border-left">
                      <h3 class="text-center mt-3 ml-2"></h3>
                    </div> --}}
                  </div>
                  
                
              </div>
              <!-- /.info-box-content -->
            </div></a>

          </div>
          
          
          
          
        </div>
      </div>
    </fieldset><br>
       
        <fieldset class=" border border-primary rounded text-center">
          <legend class="ml-2 w-auto px-3 border border-primary rounded"><h5 class="mt-2">ASPEK KEUANGAN </h5></legend>
        <div class="content ml-2 mr-2">
          <div class="row">
            
          <div class="col">
          <a href="#" data-toggle="modal" data-target="#modal-roe" id="roe"><div class="info-box">
              <span class="info-box-icon  {{$clsRoe}} elevation-1"><i class="fas fa-chart-bar"></i></span>
              <div class="info-box-content">

                <div class="row">
                  <div class="col col-md-9">
                    <span class="info-box-text">Return On Equity</span>
                      <span class="info-box-number">
                        {{$hasilRoe}}
                        <small>%</small>
                      </span>
                    </div>

                  <div class="col border-left">
                    <h3 class="text-center mt-3 ml-2">{{$nilaiRoe}} / 5</h3>
                  </div>
                </div>
                
              </div>
            </div></a>
          </div>

          <div class="col">
            <a href="#" id="rop" data-toggle="modal" data-target="#modal-rop"><div class="info-box mb-3">
              <span class="info-box-icon {{$clsRop}} elevation-1"><i class="fas fa-balance-scale"></i></span>

              <div class="info-box-content">
                <div class="row">
                  <div class="col col-md-9">
                    <span class="info-box-text">Ratio Operasional</span>
                      <span class="info-box-number">{{$hasilRop}}
                        <small>%</small>
                      </span>
                    </div>

                    <div class="col border-left">
                      <h3 class="text-center mt-3 ml-2">{{$nilaiRop}} / 5</h3>
                    </div>
                  </div>
                  
                
              </div>
              <!-- /.info-box-content -->
            </div></a>

          </div>
          <div class="col">
            <a href="#" id="rok" data-toggle="modal" data-target="#modal-rok"><div class="info-box mb-3">
              <span class="info-box-icon {{$clsRok}} elevation-1"><i class="fas fa-chart-pie"></i></span>

              <div class="info-box-content">
                <div class="row">
                  <div class="col col-md-9">
                    <span class="info-box-text">Ratio Kas</span>
                      <span class="info-box-number">{{$hasilRok}}
                        <small>%</small>
                      </span>
                    </div>
                  <div class="col border-left">
                    <h3 class="text-center mt-3 ml-2">{{$nilaiRok}} / 5</h3>
                  </div>
                </div>
                
                
              </div>
              <!-- /.info-box-content -->
            </div></a>


          </div>
          <div class="col">
            <a href="#" id="ep" data-toggle="modal" data-target="#modal-ef"><div class="info-box mb-3">
              <span class="info-box-icon {{$clsEf}} elevation-1"><i class="fas fa-hand-holding-usd"></i></span>

              <div class="info-box-content">
                <div class="row">
                  <div class="col col-md-9">
                    <span class="info-box-text">Efektifitas Penagihan</span>
                      <span class="info-box-number">{{$hasilEf}}
                        <small>%</small>
                      </span>

                  </div>
                  <div class="col border-left">
                    <h3 class="text-center mt-3 ml-2">{{$nilaiEf}} / 5</h3>
                  </div>
                </div>
                
                
              </div>
              <!-- /.info-box-content -->
            </div></a>
            <!-- /.info-box -->

          </div>
          <div class="col">
            <a href="#" id="solv" data-toggle="modal" data-target="#modal-sol"><div class="info-box mb-3">
              <span class="info-box-icon {{$clsSol}} elevation-1"><i class="fas fa-handshake"></i></span>

              <div class="info-box-content">
                <div class="row">
                  <div class="col col-md-9">
                    <span class="info-box-text">Solvabilitas</span>
                      <span class="info-box-number">{{$hasilSol}}
                        <small>%</small>
                      </span>
                    </div>

                  <div class="col border-left">
                    <h3 class="text-center mt-3 ml-2">{{$nilaiSol}} / 5</h3>
                  </div>
                </div>
                
                
              </div>
              <!-- /.info-box-content -->
            </div></a>

          </div>
          
        </div>
      </div>
    </fieldset><br>
        <!-- /.row -->

        <div class="row">
          <div class="col">
            
                <div class="row">
                  <div class="col col-md-5">
                    <fieldset class=" border border-success rounded text-center">
                      <legend class="ml-2 w-auto px-3 border border-success rounded"><h5 class="mt-2">ASPEK PELAYANAN</h5></legend>
                    
                    <div class="container">

                      <table class="table table-striped">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th  style="text-align: left;" ><h3>Task</h3></th>
                           
                            <th style="width: 40px"><h3>Hasil</h3></th>
                            <th style="width: 40px"><h3>Nilai</h3></th>
                            <th style="width: 40px"><h3>Target</h3></th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>1.</td>
                            <td style="text-align: left;"><a href="#" id="cakup" data-toggle="modal" data-target="#modal-ckp"><h5>CAKUPAN PELAYANAN TEKNIS</h5></a></td>
                            
                            <td><span id="colCakup" class="badge {{$clsCkp}}"><h5 id="cakpuanLyn">{{$hasilCkp}} %</h5></span></td>
                            <td><h5 id="nilaiCakup">{{$nilaiCkp}}</h5></td>
                            <td><h5>5</h5></td>
                          </tr>
                          
                          <tr>
                            <td>2.</td>
                            <td  style="text-align: left;"><a href="#" id="aduan" data-toggle="modal" data-target="#modal-adu"><h5>PENYELESAIAN ADUAN</h5></a></td>
                            
                            <td><span id="colAduan" class="badge {{$clsAdu}}"><h5 id="hasilAduan" >{{$hasilAdu}}%</h5></span></td>
                            <td><h5 id="nilaiAduan">{{$nilaiAdu}}</h5></td>
                            <td><h5>5</h5></td>
                          </tr>
                          <tr>
                            <td>3.</td>
                            <td  style="text-align: left;"><a href="#" id="dom" data-toggle="modal" data-target="#modal-dom"><h5>KONSUMSI AIR DOMESTIK (lt/plg/bulan)</h5></a></td>
                           
                            <td><span id="colDomestik" class="badge {{$clsDom}}"><h5 id="hasilDomestik">{{$hasilDom}}</h5></span></td>
                            <td><h5 id="nilaiDomestik">{{$nilaiDom}}</h5></td>
                            <td><h5>5</h5></td>
                          </tr>
                          <tr>
                            <td>4.</td>
                            <td  style="text-align: left;"><a href="#" id="kualitas" data-toggle="modal" data-target="#modal-qap"><h5>KUALITAS AIR PELANGGAN</h5></a></td>
                            
                            <td><span id="colUji" class="badge {{$clsQap}}"><h5 id="hasilUji">{{$hasilQap}}%</h5></span></td>
                            <td><h5 id="nilaiUji">{{$nilaiQap}}</h5></td>
                            <td><h5>5</h5></td>
                          </tr>
                          <tr>
                            <td>5.</td>
                            <td  style="text-align: left;"><a href="#" id="pertumbuhan" data-toggle="modal" data-target="#modal-tbh"><h5>PERTUMBUHAN PELANGGAN</h5></a></td>
                            
                            <td><span id="colTumbuh" class="badge {{$clsTbh}}"><h5 id="hasilTumbuh">{{$hasilTbh}}%</h5></span></td>
                            <td><h5 id="nilaiTumbuh">{{$nilaiTbh}}</h5></td>
                            <td><h5>5</h5></td>
                          </tr>
                        </tbody>
                      </table>
                    
                    </div>
                  </fieldset>
                  </div>

                
                  <!-- /.col -->
                  <div class="col">
                    <fieldset class=" border border-warning rounded text-center">
                      <legend class="ml-2 w-auto px-3 border border-warning rounded"><h5 class="mt-2">ASPEK OPERASIONAL </h5></legend>
                    <div class="p-1 flex-fill" style="overflow: hidden"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>

                    <div class="row">
                      <div class="col">
                        <!-- MAP -->
                          <a href="#" id="rasioProd" data-toggle="modal" data-target="#modal-prod"><div id="colRasioProd" class="info-box {{$clsProd}}">
                            <span class="info-box-icon"><i class="fa fa-cogs"></i></span>
              
                            <div class="info-box-content">
                              <span class=""><h4>Rasio Produksi</h4></span>
                              <span class="info-box-number"><h4 id="rasioProduksi">{{$hasilProd}}</h4></span>
                            </div>

                            <div class="info-box-text  mr-3 ml-2 mt-3"><h3 class="text-center" id="nilaiRasioProd">{{$nilaiProd}}/5</h3></div>
                            <!-- /.info-box-content -->
                          </div></a>  
                        </div>
                       
                        <div class="col">
                              <!-- /.info-box -->
                          <a href="#" id="nrw" data-toggle="modal" data-target="#modal-nrw"><div id="colNrw" class="info-box {{ $clsNrw }}">
                            <span class="info-box-icon"><i class="fa fa-tint"></i></span>
              
                            <div class="info-box-content">
                              <span class=""><h4>Kehilangan Air</h4></span>
                              <span class=""><h4 id="kehilangan">{{$nrw}}</h4></span>
                            </div>
                            <!-- /.info-box-content -->
                            <div class="info-box-text  mr-3 ml-2 mt-3"><h3 id="kehilnganNilai" class="text-center">{{$nilaiNrw}}/5</h3></div>
                        </div></a>
                      </div>

                      
                    </div>

                    <div class="row">
                      <div class="col">
                        <!-- /.info-box -->
                      <a href="#" id="jam" data-toggle="modal" data-target="#modal-jam"><div id="colJam" class="info-box {{$clsJam}}">
                        <span class="info-box-icon"><i class="fas fa-clock"></i></span>
          
                        <div class="info-box-content">
                          <span class=""><h4>Jam Operasi Layanan (jam/hari)</h4></span>
                          <span class=""><h4 id="jamOperasi">{{$jam}} Jam</h4></span>
                        </div>
                        <!-- /.info-box-content -->
                        <div class="info-box-text  mr-3 ml-2 mt-3"><h3 class="text-center" id="jamNilai">{{$nilaiJam}}/5</h3></div>
                      </div></a>
                    </div>

                    <div class="col">
                      <!-- /.info-box -->
                    <a href="#" id="tekanan" data-toggle="modal" data-target="#modal-tek"><div id="coltekanan" class="info-box {{$clsTek}}">
                      <span class="info-box-icon"><i class="fas fa-tachometer-alt"></i></span>
        
                      <div class="info-box-content">
                        <span class=""><h4>Tekanan Air Pada SL</h4></span>
                        <span class=""><h4 id="tekananHasil">{{$tekanan}}%</h4></span>
                      </div>
                      <!-- /.info-box-content -->
                      <div class="info-box-text  mr-3 ml-2 mt-3"><h3 class="text-center" id="tekananNilai">{{$nilaiTek}}/5</h3></div>
                    </div></a>
                    <!-- /.info-box -->

                </div>



                    </div>

                     <div class="row">
                      

                            <div class="col">
                              <!-- /.info-box -->
                            <a href="#" id="kalibrasi" data-toggle="modal" data-target="#modal-kal"><div id="colkalibarasi" class="info-box {{$clsKal}}">
                              <span class="info-box-icon"><i class="fa fa-shower"></i></span>
                
                              <div class="info-box-content">
                                <span class=""><h4>Penggantian Dan Kalibrasi Meter</h4></span>
                                <span class=""><h4 id="kalibarasiHasil">{{$kalibrasi}}</h4></span>
                              </div>
                              <!-- /.info-box-content -->
                              <div class="info-box-text  mr-3 ml-2 mt-3"><h3 class="text-center" id="kalibarasiNilai">{{$nilaiKal}}/5</h3></div>
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
                    </fieldset>
                  </div><!-- /.d-md-flex -->
                </div>
                <!-- /.row -->
              </div>
              <!-- ./card-body -->
              
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div><br>
          <!-- /.col -->
        
        <!-- /.row -->

    <!--/. container-fluid -->

        <!-- ASPEK OPERASIONAL -->
        <fieldset class="border border-danger rounded">
          <legend class="ml-2 w-auto px-3 border border-danger rounded text-center"><h5 class="mt-2">ASPEK ADMINISTRASI </h5></legend>
        <div class="content ml-2 mr-2">
        <div class="card">
          <div class="row">
            <div class="col-sm-3 col-6">
              <div class="description-block border-right">
                
                <h5 class="description-header text-success">RENCANA JANGKA PANJANG</h5>
                <span class="">Sepenuhnya Dipedomani</span>
                <span class=""><h3>4/4</h3></span>
              </div>
              <!-- /.description-block -->
            </div>
            <!-- /.col -->
            <div class="col-sm-3 col-6">
              <div class="description-block border-right">
               
                <h5 class="description-header text-warning">PROSUDUR OPERASI STANDAR</h5>
                <span class="">Sepenuhnya Dipedomani</span>
                <span class=""><h3>4/4</h3></span>
              </div>
              <!-- /.description-block -->
            </div>
            <!-- /.col -->
            <div class="col-sm-3 col-6">
              <div class="description-block border-right">
                
                <h5 class="description-header text-primary">RENCANA PENILAIAN KINERJA KARYAWAN</h5>
                <span class="">Sepenuhnya Dipedomani</span>
                <span class=""><h3>4/4</h3></span>
              </div>
              <!-- /.description-block -->
            </div>
            <!-- /.col -->
            <div class="col-sm-3 col-6">
              <div class="description-block">
                
                <h5 class="description-header text-info">RENCANA KERJA DAN ANGGARAN PERUSAHAAN</h5>
                <span class="">Sepenuhnya Dipedomani</span>
                <span class=""><h3>3/4</h3></span>
              </div>
              <!-- /.description-block -->
            </div>
          </div>
          <!-- /.row -->
        </div>
        </div>
        </fieldset><br>
      
        <fieldset class="border border-info rounded">
          <legend class="ml-2 w-auto px-3 border border-info rounded text-center"><h5 class="mt-2">ASPEK SDM </h5></legend>
        <div class="row">
          

          <div class="col">
            <div class="card">
              <a href="#" id="rasioPegawai" data-toggle="modal" data-target="#modal-rpl"><div class="card-header"><h6 class="text-center">RASIO PEGAWAI TERHADAP PELANGGAN</h6></div></a>
              <div class="card-body">
                <div class="row">
                  <div class="col">
                    <canvas id="pelanggan" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 443px;" width="443" height="250" class="chartjs-render-monitor"></canvas>
                  </div>
                  <div class="col border-left">
                    <table class="table table-striped text-center">
                      <thead>
                        <tr>
                          <th><h4 >HASIL</h4></th>
                          <th><h4 >NILAI</h4></th>
                          <th><h4>TARGET</h4></th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td><h4 id="hasilRaspeg">{{$hasilRpl}} %</h4></td>
                          <td><h4 id="nilaiRaspeg">{{$nilaiRpl}}</h4></td>
                          <td><h4>5</h4></td>
                        </tr>
                        
                      </tbody>
                    </table>
                    

                  </div>
                </div>
                

              </div>
            </div>
           
          </div>

          <div class="col">
            <div class="card">
              <a href="#" id="rasioDiklat" data-toggle="modal" data-target="#modal-rdp"><div class="card-header"><h6 class="text-center">RASIO DIKLAT PEGAWAI</h6></div></a>
              <div class="card-body">
                <div class="row">
                  <div class="col">
                    <canvas id="pegawai" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 443px;" width="443" height="250" class="chartjs-render-monitor"></canvas>

                  </div>
                  <div class="col border-left">
                    
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
                          <td><h4 id="hasilRasdik">{{$hasilRdp}} %</h4></td>
                          <td><h4 id="nilaiRasdik">{{$nilaiRdp}}</h4></td>
                          <td><h4>5</h4></td>
                        </tr>
                        
                      </tbody>
                    </table>

                  </div>
                </div>
                
              </div>
            </div>
            
          </div>

          <div class="col">
            <div class="card">
              <a href="#" id="rasioBiaya" data-toggle="modal" data-target="#modal-rbd"><div class="card-header"><h6 class="text-center">RASIO BIAYA DIKLAT</h6></div></a>
              <div class="card-body">
                <div class="row">
                  <div class="col">
                    <canvas id="diklat" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 443px;" width="443" height="250" class="chartjs-render-monitor"></canvas>

                  </div>
                  <div class="col border-left">
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
                          <td><h4 id="hasilRasby">{{$hasilRbd}} %</h4></td>
                          <td><h4 id="nilaiRasby">{{$nilaiRbd}}</h4></td>
                          <td><h4>5</h4></td>
                        </tr>
                        
                      </tbody>
                    </table>

                  </div>
                </div>
                

              </div>
            </div>
            
          </div>
          

        </div>
      </fieldset>

  </div>

  <!-- <div class="modal fade" id="modal-lg" aria-hidden="true" style="display: none;">
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
                        </tr>
                        <tr>
                            <td id="b"><h2>NAMA OBJECT 2</h2></td>
                            <td id="b_nilai" style="text-align: right;"><h2>2000.000</h2></td>
                        </tr>
                     </table>

                    </div>
                    <div class="col">
                      <div class="container">
                        <h1 class="mt-3" id="persen"><strong>X 100 %</strong></h1>
                      </div>

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

                  <div class="row">
                    <canvas id="revenue-chart-canvas" height="450" style="height: 300px; display: block; width: 580px;" width="870" class="chartjs-render-monitor"></canvas>
                  </div>
              
                 </div>
              </div>
            </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default"data-dismiss="modal">CLOSE</button>
      </div>
    </div>
  </div>
</div> -->

 <script>
  window.dataRoe = @json($persentaseBulananRoe);
  window.dataRop = @json($persentaseRopBulanan);
  window.dataRok = @json($persentaseBulananRok);
  window.dataEf = @json($persentaseBulananEf);
  window.dataSol = @json($persentaseBulananSol);
  window.dataProd = @json($persentaseBulananProd);
  window.dataNrw = @json($persentaseBulananNrw);
  window.dataJam = @json($persentaseBulananJam);
  window.dataTek = @json($persentaseBulananTek);
  window.dataKal = @json($persentaseBulananKal);
  window.dataCkp = @json($persentaseBulananCkp);
  window.dataAdu = @json($persentaseBulananAdu);
  window.dataDom = @json($persentaseBulananDom);
  window.dataQap = @json($persentaseBulananQap);
  window.dataTbh = @json($persentaseBulananTbh);
  window.dataRpl = @json($persentaseBulananRpl);
  window.dataRdp = @json($persentaseBulananRdp);
  window.dataRbd = @json($persentaseBulananRbd);
  window.dataBul = @json($urutanBulan);

  window.dataRplChart = @json($hasilRpl);
  window.dataRdpChart = @json($hasilRdp);
  window.dataRbdChart = @json($hasilRbd);

  window.dataRplPie = @json($clsRplPie);
  window.dataRdpPie = @json($clsRdpPie);
  window.dataRbdPie = @json($clsRbdPie);

 </script>
  @include('mobile.modal_keu.roe')
  @include('mobile.modal_keu.rop')
  @include('mobile.modal_keu.rok')
  @include('mobile.modal_keu.ef')
  @include('mobile.modal_keu.sol')
  @include('mobile.modal_prod.prod')
  @include('mobile.modal_prod.nrw')
  @include('mobile.modal_prod.jam')
  @include('mobile.modal_prod.tek')
  @include('mobile.modal_prod.kal')
  @include('mobile.modal_pelayanan.ckp')
  @include('mobile.modal_pelayanan.adu')
  @include('mobile.modal_pelayanan.dom')
  @include('mobile.modal_pelayanan.qap')
  @include('mobile.modal_pelayanan.tbh')
  @include('mobile.modal_sdm.rpl')
  @include('mobile.modal_sdm.rdp')
  @include('mobile.modal_sdm.rbd')
@endsection
