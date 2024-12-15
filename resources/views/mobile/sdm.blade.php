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

  <a href="#" id="rasioPegawai"><div class="info-box  bg-warning">
            <span class="info-box-icon"><i class="fas fa-balance-scale"></i></span>
            <div class="info-box-content">
              <span class=""><h5>Rasio Pegawai Terhadap Pelanggan</h5></span>
              <span class="info-box-number">
                    3,56
                    <small>%</small>
              </span>
            </div>
            <div class="info-box-text  mr-3 ml-2 mt-3"><h5 class="text-center"> 4 / 5</h5></div>
        </div></a>

        <a href="#" id="rasioDiklat"><div class="info-box  bg-success">
            <span class="info-box-icon"><i class="fas fa-balance-scale"></i></span>
            <div class="info-box-content">
              <span class=""><h5>Rasio Diklat Pegawai</h5></span>
              <span class="info-box-number">
                    86,67
                    <small>%</small>
              </span>
            </div>
            <div class="info-box-text  mr-3 ml-2 mt-3"><h5 class="text-center"> 5 / 5</h5></div>
        </div></a>


        <a href="#" id="rasioBiaya"><div class="info-box  bg-danger">
            <span class="info-box-icon"><i class="fas fa-balance-scale"></i></span>
            <div class="info-box-content">
              <span class=""><h5>Rasio Biaya Diklat</h5></span>
              <span class="info-box-number">
                    2,90
                    <small>%</small>
              </span>
            </div>
            <div class="info-box-text  mr-3 ml-2 mt-3"><h5 class="text-center"> 2 / 5</h5></div>
        </div></a>
      </div>
</div><br> 
@endsection
