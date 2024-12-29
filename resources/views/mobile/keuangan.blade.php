@extends('layouts.main')

@section('title')
  ASET | DASHBAORAD
@endsection

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <h1 class="m-0 text-center">KEUANGAN</h1>
  </div>
  <!-- /.content-header -->
  <div class="container"><br>
    
            
    <div class="col">
     <a href="#" id="roe" data-toggle="modal" data-target="#modal-roe">
          <div id="colRoe" class="info-box {{$clsRoe}}">
            <span class="info-box-icon"><i class="fas fa-chart-bar"></i></span>

            <div class="info-box-content">
              <span class=""><h5>Return Of Equity</h5></span>
              <span class="info-box-number" id="hasilRoe">
                    {{$hasilRoe}}
                    <small>%</small>
              </span>
            </div>
            <div class="info-box-text  mr-3 ml-2 mt-3"><h3 class="text-center" id="nilaiRoe">{{$nilaiRoe}} / 5</h3></div>
          </div>
      </a>
      </div>

      <div class="col">
        <a href="#" id="rop" data-toggle="modal" data-target="#modal-rop">
        <div id="colRop" class="info-box {{$clsRop}}">
            <span class="info-box-icon"><i class="fas fa-balance-scale"></i></span>

            <div class="info-box-content">
              <span class=""><h5>Ratio Operasional</h5></span>
              <span class="info-box-number" id="hasilRop">
                    {{$hasilRop}}
                    <small>%</small>
              </span>
            </div>
            <div class="info-box-text  mr-3 ml-2 mt-3"><h3 class="text-center" id="nilaiRop">{{$nilaiRop}} / 5</h3></div>
          </div>
        </a>

      </div>
      <div class="col">
        <a href="#" id="rok" data-toggle="modal" data-target="#modal-rok">
          <div id="colRok" class="info-box {{$clsRok}}">
              <span class="info-box-icon"><i class="fas fa-chart-pie"></i></span>

              <div class="info-box-content">
                <span class=""><h5>Ratio Kas</h5></span>
                <span class="info-box-number" id="hasilRok"> 
                        {{$hasilRok}}
                      <small>%</small>
                </span>
              </div>
              <div class="info-box-text  mr-3 ml-2 mt-3"><h3 class="text-center" id="nilaiRok">{{$nilaiRok}} / 5</h3></div>
            </div>
          </a>
        </div>
      <div class="col">
        <a href="#" id="ep" data-toggle="modal" data-target="#modal-ef">
        <div id="colEf" class="info-box {{$clsEf}}">
              <span class="info-box-icon"><i class="fas fa-hand-holding-usd"></i></span>

              <div class="info-box-content">
                <span class=""><h5>Efektifitas Penagihan</h5></span>
                <span class="info-box-number" id="hasilEf">
                      {{$hasilEf}}
                      <small>%</small>
                </span>
              </div>
              <div class="info-box-text  mr-3 ml-2 mt-3"><h3 class="text-center" id="nilaiEf">{{$nilaiEf}} /5</h3></div>
          </div>
      </a>
    </div>
      <div class="col">
        <a href="#" id="solv" data-toggle="modal" data-target="#modal-sol">
        <div class="info-box {{$clsSol}}" id="colSol">
              <span class="info-box-icon"><i class="fas fa-handshake"></i></span>
            

              <div class="info-box-content">
                <span class=""><h5>Solvabilitas</h5></span>
                <span id="hasilSol" class="info-box-number">
                      {{$hasilSol}}
                      <small>%</small>
                </span>
              </div>
              <div class="info-box-text  mr-3 ml-2 mt-3"><h3 class="text-center" id="nilaiSol">{{$nilaiSol}} /5</h3></div>
          </div>

          
        </a>
      </div>
      
   
  </div>
</div>
<script>
  
    window.dataRoe = @json($persentaseBulananRoe);
    window.dataRop = @json($persentaseRopBulanan);
    window.dataRok = @json($persentaseBulananRok);
    window.dataEf = @json($persentaseBulananEf);
    window.dataSol = @json($persentaseBulananSol);

</script>

@include('mobile.modal_keu.roe')
@include('mobile.modal_keu.rop')
@include('mobile.modal_keu.rok')
@include('mobile.modal_keu.ef')
@include('mobile.modal_keu.sol')
@endsection
