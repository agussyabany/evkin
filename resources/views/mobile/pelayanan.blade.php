@extends('layouts.main')

@section('title')
  ASET | DASHBAORAD
@endsection

@section('content')
<div class="content-wrapper">
  <div class="content-header">
    <h1 class="m-0 text-center">ASPEK PELAYANAN TAHUN {{session('tahun')}}</h1>
  </div>
  <div class="container">
  <a href="#" id="cakup" data-toggle="modal" data-target="#modal-ckp"><div id="colCakup" class="info-box {{$clsCkp}}">
            <span class="info-box-icon"><i class="fas fa-globe-asia"></i></span>
            <div class="info-box-content">
              <span class=""><h5>Cakupan Pelayanan Teknis</h5></span>
              <span class="info-box-number" id="cakpuanLyn">
                      {{$hasilCkp}}
                    <small>%</small>
              </span>
            </div>
            <div class="info-box-text  mr-3 ml-2 mt-3"><h5 class="text-center" id="nilaiCakup"> {{$nilaiCkp}} /5</h5></div>
        </div></a>

        <a href="#" id="aduan" data-toggle="modal" data-target="#modal-adu"><div id="colAduan" class="info-box {{$clsAdu}}">
            <span class="info-box-icon"><i class="fas fa-edit"></i></span>
            <div class="info-box-content">
              <span class=""><h5>Penyelesaian Aduan</h5></span>
              <span class="info-box-number" id="hasilAduan">
                    {{$hasilAdu}}
                    <small>%</small>
              </span>
            </div>
            <div class="info-box-text  mr-3 ml-2 mt-3"><h5 class="text-center" id="nilaiAduan">{{$nilaiAdu}} /5</h5></div>
        </div></a>


        <a href="#" id="dom" data-toggle="modal" data-target="#modal-dom"><div id="colDomestik" class="info-box {{$clsDom}}">
            <span class="info-box-icon"><i class="fas fa-shower"></i></span>
            <div class="info-box-content">
              <span class=""><h5>Konsumsi Air Domestik</h5></span>
              <span class="info-box-number" id="hasilDomestik">
                    {{$hasilDom}}
                    <small>%</small>
              </span>
            </div>
            <div class="info-box-text  mr-3 ml-2 mt-3"><h5 class="text-center" id="nilaiDomestik">{{$nilaiDom}} /5</h5></div>
        </div></a>

        <a href="#" id="kualitas" data-toggle="modal" data-target="#modal-qap"><div id="colUji" class="info-box {{$clsQap}}">
            <span class="info-box-icon"><i class="fas fa-water"></i></span>
            <div class="info-box-content">
              <span class=""><h5>Kualitas Air Pelanggan</h5></span>
              <span class="info-box-number" id="hasilUji">
                       {{$hasilQap}}
                    <small>%</small>
              </span>
            </div>
            <div class="info-box-text  mr-3 ml-2 mt-3"><h5 class="text-center" id="nilaiUji">{{$nilaiQap}} /5</h5></div>
        </div></a>

        <a href="#" id="pertumbuhan" data-toggle="modal" data-target="#modal-tbh"><div id="colTumbuh" class="info-box {{$clsTbh}}">
            <span class="info-box-icon"><i class="fas fa-chart-line"></i></span>
            <div class="info-box-content">
              <span class=""><h5>Pertumbuhan Pelanggan</h5></span>
              <span class="info-box-number" id="hasilTumbuh">
                      {{$hasilTbh}}
                    <small>%</small>
              </span>
            </div>
            <div class="info-box-text  mr-3 ml-2 mt-3"><h5 class="text-center" id="nilaiTumbuh">{{$nilaiTbh}} /5</h5></div>
        </div></a>
  </div>
</div><br>
<script>
  
  window.dataCkp = @json($persentaseBulananCkp);
  window.dataAdu = @json($persentaseBulananAdu);
  window.dataDom = @json($persentaseBulananDom);
  window.dataQap = @json($persentaseBulananQap);
  window.dataTbh = @json($persentaseBulananTbh);
  window.dataBul = @json($urutanBulan);
  

</script>

    @include('mobile.modal_pelayanan.ckp')
    @include('mobile.modal_pelayanan.adu')
    @include('mobile.modal_pelayanan.dom')
    @include('mobile.modal_pelayanan.qap')
    @include('mobile.modal_pelayanan.tbh')
    @include('mobile.bottom.bootm')
    

@endsection
