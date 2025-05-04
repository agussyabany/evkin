@extends('layouts.main')

@section('title')
  ASET | DASHBAORAD
@endsection

@section('content')
<div class="content-wrapper">
  <div class="content-header">
    <h1 class="m-0 text-center">ASPEK SDM TAHUN {{session('tahun')}}</h1>
  </div>
  <div class="container">

  <a href="#" id="rasioPegawai" data-toggle="modal" data-target="#modal-rpl"><div id="colRaspeg" class="info-box {{$clsRpl}}">
            <span class="info-box-icon"><i class="fas fa-balance-scale"></i></span>
            <div class="info-box-content">
              <span class=""><h5>Rasio Pegawai Terhadap Pelanggan</h5></span>
              <span class="info-box-number" id="hasilRaspeg"> 
                    {{$hasilRpl}}
                    <small>%</small>
              </span>
            </div>
            <div class="info-box-text  mr-3 ml-2 mt-3"><h5 class="text-center" id="nilaiRaspeg">{{$nilaiRpl}} / 5</h5></div>
        </div></a>

        <a href="#" id="rasioDiklat" data-toggle="modal" data-target="#modal-rdp"><div id="colRasdik" class="info-box {{$clsRdp}}">
            <span class="info-box-icon"><i class="fas fa-balance-scale"></i></span>
            <div class="info-box-content">
              <span class=""><h5>Rasio Diklat Pegawai</h5></span>
              <span class="info-box-number" id="hasilRasdik">
                {{$hasilRdp}}
                    <small></small>
              </span>
            </div>
            <div class="info-box-text  mr-3 ml-2 mt-3"><h5 class="text-center" id="nilaiRasdik">{{$nilaiRdp}} / 5</h5></div>
        </div></a>


        <a href="#" id="rasioBiaya" data-toggle="modal" data-target="#modal-rbd"><div id="colRasby" class="info-box {{$clsRbd}}">
            <span class="info-box-icon"><i class="fas fa-balance-scale"></i></span>
            <div class="info-box-content">
              <span class=""><h5>Rasio Biaya Diklat</h5></span>
              <span class="info-box-number" id="hasilRasby">
                {{$hasilRbd}}
                    <small></small>
              </span>
            </div>
            <div class="info-box-text  mr-3 ml-2 mt-3"><h5 class="text-center" id="nilaiRasby">{{$nilaiRbd}} / 5</h5></div>
        </div></a>
      </div>
</div><br> 

<script>
  
  window.dataRpl = @json($persentaseBulananRpl);
  window.dataRdp = @json($persentaseBulananRdp);
  window.dataRbd = @json($persentaseBulananRbd);
  window.dataBul = @json($urutanBulan);
  
  

</script>

    @include('mobile.modal_sdm.rpl')
    @include('mobile.modal_sdm.rdp')
    @include('mobile.modal_sdm.rbd')
@endsection
