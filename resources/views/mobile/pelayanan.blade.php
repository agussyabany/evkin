@extends('layouts.main')

@section('title')
  ASET | DASHBAORAD
@endsection

@section('content')
<div class="content-wrapper">
  <div class="content-header">
    <h1 class="m-0 text-center">PELAYANAN</h1>
  </div>
  <div class="container">
  <a href="#" id="cakup"><div id="colCakup" class="info-box">
            <span class="info-box-icon"><i class="fas fa-globe-asia"></i></span>
            <div class="info-box-content">
              <span class=""><h5>Cakupan Pelayanan Teknis</h5></span>
              <span class="info-box-number" id="cakpuanLyn">
                    
                    <small>%</small>
              </span>
            </div>
            <div class="info-box-text  mr-3 ml-2 mt-3"><h5 class="text-center" id="nilaiCakup"> </h5></div>
        </div></a>

        <a href="#" id="aduan"><div id="colAduan" class="info-box">
            <span class="info-box-icon"><i class="fas fa-edit"></i></span>
            <div class="info-box-content">
              <span class=""><h5>Penyelesaian Aduan</h5></span>
              <span class="info-box-number" id="hasilAduan">
                    
                    <small></small>
              </span>
            </div>
            <div class="info-box-text  mr-3 ml-2 mt-3"><h5 class="text-center" id="nilaiAduan"></h5></div>
        </div></a>


        <a href="#" id="dom"><div id="colDomestik" class="info-box">
            <span class="info-box-icon"><i class="fas fa-shower"></i></span>
            <div class="info-box-content">
              <span class=""><h5>Konsumsi Air Domestik</h5></span>
              <span class="info-box-number" id="hasilDomestik">
                    
                    <small></small>
              </span>
            </div>
            <div class="info-box-text  mr-3 ml-2 mt-3"><h5 class="text-center" id="nilaiDomestik"></h5></div>
        </div></a>

        <a href="#" id="kualitas"><div id="colUji" class="info-box">
            <span class="info-box-icon"><i class="fas fa-water"></i></span>
            <div class="info-box-content">
              <span class=""><h5>Kualitas Air Pelanggan</h5></span>
              <span class="info-box-number" id="hasilUji">
                    <small></small>
              </span>
            </div>
            <div class="info-box-text  mr-3 ml-2 mt-3"><h5 class="text-center" id="nilaiUji"></h5></div>
        </div></a>

        <a href="#" id="pertumbuhan"><div id="colTumbuh" class="info-box">
            <span class="info-box-icon"><i class="fas fa-chart-line"></i></span>
            <div class="info-box-content">
              <span class=""><h5>Pertumbuhan Pelanggan</h5></span>
              <span class="info-box-number" id="hasilTumbuh">
                   
                    <small></small>
              </span>
            </div>
            <div class="info-box-text  mr-3 ml-2 mt-3"><h5 class="text-center" id="nilaiTumbuh"></h5></div>
        </div></a>
  </div>
</div><br>
@endsection
