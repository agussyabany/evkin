@extends('layouts.main')

@section('title')
  ASET | DASHBAORAD
@endsection

@section('content')
<div class="content-wrapper">
  <div class="content-header">
    <h1 class="m-0 text-center">SUMBER DAYA MANUSIA</h1>
  </div>
  <div class="container">

  <a href="#" id="rasioPegawai"><div id="colRaspeg" class="info-box">
            <span class="info-box-icon"><i class="fas fa-balance-scale"></i></span>
            <div class="info-box-content">
              <span class=""><h5>Rasio Pegawai Terhadap Pelanggan</h5></span>
              <span class="info-box-number" id="hasilRaspeg"> 
                    
                    <small></small>
              </span>
            </div>
            <div class="info-box-text  mr-3 ml-2 mt-3"><h5 class="text-center" id="nilaiRaspeg"></h5></div>
        </div></a>

        <a href="#" id="rasioDiklat"><div id="colRasdik" class="info-box">
            <span class="info-box-icon"><i class="fas fa-balance-scale"></i></span>
            <div class="info-box-content">
              <span class=""><h5>Rasio Diklat Pegawai</h5></span>
              <span class="info-box-number" id="hasilRasdik">
                   
                    <small></small>
              </span>
            </div>
            <div class="info-box-text  mr-3 ml-2 mt-3"><h5 class="text-center" id="nilaiRasdik"></h5></div>
        </div></a>


        <a href="#" id="rasioBiaya" ><div id="colRasby" class="info-box">
            <span class="info-box-icon"><i class="fas fa-balance-scale"></i></span>
            <div class="info-box-content">
              <span class=""><h5>Rasio Biaya Diklat</h5></span>
              <span class="info-box-number" id="hasilRasby">
                    
                    <small></small>
              </span>
            </div>
            <div class="info-box-text  mr-3 ml-2 mt-3"><h5 class="text-center" id="nilaiRasby"></h5></div>
        </div></a>
      </div>
</div><br> 
@endsection
