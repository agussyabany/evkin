@extends('layouts.main')

@section('title')
  EVKIN | DASHBAORAD
@endsection

@section('content')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <h1 class="m-0 text-center">ASPEK OPERASIONAL  {{ \App\Helpers\EvkinHelper::namaBulan(session('bulan_awal')) }} s/d {{ \App\Helpers\EvkinHelper::namaBulan(session('bulan_akhir')) }}  {{ session('tahun') }}</h1>
  </div>
  <!-- /.content-header -->
  <div class="content">
    <div class="float-right">
      @if (Auth::user()->hasAnyRole(['adminTeknik','agus']))
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_operasional" id="tambah_operasional">TAMBAH</button>
      @endif
    </div>
  <br><br>
  
  <fieldset class="border border-primary rounded">
    <legend class="ml-2 w-auto px-3 border border-primary rounded"><h6>ASPEK OPERASIONAL</h6></legend>
  <div class="card">
    <div class="card-header"></div>
    <div class="card-body">
      <table class="table table-striped responsive" id="tbl">
        <thead>
            <tr>
                <th>NO</th>
                <th>Periode</th>
                <th>Jumlah Hari</th>
                <th class="text-wrap" style="width: 200px;">Volume Produksi Riil</th>
                <th class="text-wrap" style="width: 200px;">Jumlah Kapasitas Terpasang</th>
                <th class="text-wrap" style="width: 200px;">Jumlah Air Didistribusikan</th>
                <th class="text-wrap" style="width: 200px;">Jumlah Air Terjual (DRD)</th>
                <th class="text-wrap" style="width: 200px;">Air Tidak Berekening (NRW)</th>
                <th class="text-wrap" style="width: 200px;">Presentase NRW</th>
                
                <th class="text-wrap" style="width: 200px;">Jumlah Waktu Pelayanan/Distribusi Air ke Pelanggan dalam Sebulan</th>
                
                <th>Jumlah Pelanggan yang Dilayanai dengan Tekanan > 0,7 Bar</th>
                <th>Jml Aduan Pelanggan di Distribusi & PKA</th>
                <th>Aduan Pelayanan</th>
                <th>Total Aduan</th>
                <th class="text-wrap" style="width: 200px;">Jumlah Pelanggan Aktiv</th>
                <th>Jml Meter yg diganti/kalibrasi dalam setahun</th>
                
                @if (Auth::user()->hasAnyRole(['adminTeknik','agus','spi']))
                <th>Status</th>
                <th></th>
                @endif
            </tr>
        </thead>
        <tbody>
          <tr>
            <td></td>
            <td></td>
            <td></td>
            <td>(m3)</td>
            <td>(m3)</td>
            <td>(m3)</td>
            <td>(m3)</td>
            <td>(m3)</td>
            <td>(%)</td>
            <td>(jam/hari)</td>
            <td>(sl)</td>
            <td></td>
            <td></td>
            <td></td>
            <td>(sl)</td>
            <td>(sl)</td>
          </tr>
        @foreach($operasional as $item)
          <tr>
            <td>{{ $loop->iteration}}</td>
            <td>{{ \Carbon\Carbon::parse($item->bulanTahun)->translatedFormat('F Y') }}</td>
            <td>{{ number_format($item->hari, 0) }}</td>
           
            <td>{{ number_format($item->KpstsTrpsng, 0) }}</td>
            <td>{{ number_format($item->VolProdRil, 0) }}</td>
           
           
            <td>{{ number_format($item->JmlAirDist, 0) }}</td>
            <td>{{ number_format($item->airTerjual, 0) }}</td>
            <td>{{ number_format($item->KalkulasiJumAir, 0) }}</td>
            
            <td>{{ $item->persen }}</td>
            <td>{{ number_format($item->JmlWktPly, 0) }}</td>
           
            
            <td>{{ number_format($item->Plgnlayan, 0) }}</td>
            <td>{{ number_format($item->nrw, 0) }}</td>
            <td>{{ $item->aduPel }}</td>
            <td>{{ $item->totAdu }}</td>
            <td>{{ number_format($item->PlgnAktiv, 0) }}</td>
            <td>{{ number_format($item->MtrAirGnti, 0) }}</td>
            

            @if (Auth::user()->hasAnyRole(['adminTeknik','agus','spi']))
            <td>
              @if ($item->status == 0)
                <span style="color: rgb(225, 236, 15);">POST</span>
            @else
                <span style="color: rgb(14, 244, 6);">VERIFIED</span>
            @endif
            </td>
            
            
            <td>
              <div class="btn-group">
                          <button type="button" class="btn btn-default">Action</button>
                          <button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown" aria-expanded="false">
                            <span class="sr-only">Toggle Dropdown</span>
                          </button>
                          <div class="dropdown-menu" role="menu" style="">
                            <a class="dropdown-item" href="#" data-id="{{ $item->id }}" id="edit_operasional">Edit</a>
                            <form action="/delOps/{{ $item->id }}" method="POST" style="display:inline;">
                              @csrf
                              
                              <a class="dropdown-item" href="#" onclick="event.preventDefault(); 
                                  if (confirm('Apakah  yakin ingin menghapus data  {{ \Carbon\Carbon::parse($item->bulanTahun)->translatedFormat('F Y') }} ?')) {  
                                      this.closest('form').submit(); 
                                  }">Hapus</a>
                          </form>
                          @if (Auth::user()->hasAnyRole(['spi']))
                          <form action="/verOp/{{ $item->id }}" method="POST" style="display:inline;">
                            @csrf
                            
                            <a class="dropdown-item" href="#" onclick="event.preventDefault(); 
                                if (confirm('Apakah  yakin ingin memverivikasi data  {{ \Carbon\Carbon::parse($item->bulanTahun)->translatedFormat('F Y') }} ?')) {  
                                    this.closest('form').submit(); 
                                }">Verifikasi</a>
                        </form>
                        @endif
                          </div>
                        </div>
            </td>
            @endif
            
          </tr>
          @endforeach
          <tr>
            <td><strong>TOT</strong></td>
            <td></td>
            <td><strong>{{number_format($hari)}}</strong></td>
            <td><strong>{{number_format($VolProdRil)}}</strong></td>
            <td><strong>{{number_format($KpstsTrpsng)}}</strong></td>
            <td><strong>{{number_format($JmlAirDist)}}</strong></td>
            <td><strong>{{number_format($airTerjual)}}</strong></td>
            <td><strong>{{number_format($KalkulasiJumAir)}}</strong></td>
            <td><strong>{{number_format($persen)}}</strong></td>
            <td><strong>{{number_format($JmlWktPly)}}</strong></td>
            <td></td>
            <td>{{number_format($aduTek)}}</td>
            <td>{{number_format($aduPel)}}</td>
            <td>{{number_format($totAdu)}}</td>
            <td></td>
            <td><strong>{{ number_format($MtrAirGnti) }}</strong></td>
          </tr>
        </tbody>
    </table>
    </div>
  </div>
  </fieldset><br>

{{-- DATA BULANAN --}}









</div>
</div>

       <div class="modal fade" id="modal_operasional">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"  id="judul_operasional">Input Data Operasional</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">


              <form action="/opSave" method="POST" id="form-operasional">
                @csrf
                <input required type="hidden" id="idOps" name="idOps" class="form-control">
              <fieldset class="border border-primary rounded">
                <legend class="ml-2 w-auto px-3 border border-primary rounded"><h6>Rasio Produksi</h6></legend>
                  
                <div class="container">
                    <div class="row">
                      <div class="col form-group">
                        <label >Volume Produksi Riil</label>
                        <input required type="number" step="any" class="form-control" name="VolProdRil" id="VolProdRil">
                      </div>

                      <div class="col form-group">
                        <label >Jumlah Kapasitas Terpasang</label>
                        <input required type="number" step="any" class="form-control" name="KpstsTrpsng" id="KpstsTrpsng">
                      </div>
                    </div>
                  </div>
                </fieldset><br>

                <fieldset class="border border-success rounded">
                <legend class="ml-2 w-auto px-3 border border-success rounded"><h6>Kehilangan Air</h6></legend>
                  
                <div class="container">
                    <div class="row">
                      

                      <div class="col form-group">
                        <label>Air Didistribusikan</label>
                        <input required type="number" step="any" class="form-control" name="JmlAirDist" id="JmlAirDist">
                      </div>
                      <div class="col form-group">
                        <label>Air Terjual</label>
                        <input required type="number" step="any" class="form-control" name="drd" id="drd">
                      </div>
                      <div class="col form-group">
                        <label >Air Tidak Berekening</label>
                        <input required type="number" step="any"  class="form-control" name="KalkulasiJumAir" id="nrw">
                      </div>
                      <div class="col form-group">
                        <label >NRW %</label>
                        <input required type="number" step="any"   class="form-control" name="persen" id="persen">
                      </div>
                    </div>
                  </div>
                </fieldset><br>

                <fieldset class="border border-info rounded">
                <legend class="ml-2 w-auto px-3 border border-info rounded" style="display:flex; justify-content:flex-end; align-items:center;"><h6>Jam Operasi Layanan</h6></legend>
                  
                <div class="container">
                    <div class="row">
                      <div class="col form-group">
                        <label >Jumlah Waktu Pelayanan/Distribusi Air ke Pelanggan dalam Setahun</label>
                        <input required type="number" class="form-control" name="JmlWktPly" id="JmlWktPly">
                      </div>

                      <div class="col form-group">
                        <label >Jumlah Hari</label>
                        <input required type="number" class="form-control" name="hari" id="hari">
                      </div>
                    </div>
                  </div>
                </fieldset><br>

                <fieldset class="border border-warning rounded">
                <legend class="ml-2 w-auto px-3 border border-warning rounded" style="display:flex; justify-content:flex-end; align-items:center;"><h6>Tekanan Air Pada SL</h6></legend>
                  
                <div class="container">
                    <div class="row">
                      <div class="col form-group">
                        <label>Jumlah Pelanggan yang Dilayanai dengan Tekanan > 0,7 Bar</label>
                        <input required type="number" class="form-control" name="Plgnlayan" id="Plgnlayan">
                      </div>

                      <div class="col form-group">
                        <label>Jumlah Pelanggan Aktiv</label>
                        <input required type="number" class="form-control" name="PlgnAktiv" id="PlgnAktiv">
                      </div>
                    </div>
                  </div>
                </fieldset><br>


                <fieldset class="border border-secondary rounded">
                <legend class="ml-2 w-auto px-3 border border-secondary rounded" style="display:flex; justify-content:flex-end; align-items:center;"><h6>Penggantian / Kalibarasi Meter</h6></legend>
                  
                <div class="container">
                    <div class="row">

                      <div class="col form-group">
                        <label>Jml Meter yg diganti/kalibrasi dalam setahun</label>
                        <input required type="number" class="form-control" name="MtrAirGnti" id="MtrAirGnti">
                      </div>
                      
                      <div class="col form-group">
                        <label>Bulan</label>
                        <input required type="month" class="form-control" name="date" id="date">
                      </div>

                    </div>
                  </div>
                </fieldset><br>

                <fieldset class="border border-secondary rounded">
                  <legend class="ml-2 w-auto px-3 border border-secondary rounded" style="display:flex; justify-content:flex-end; align-items:center;"><h6>Aduan Pelanggan</h6></legend>
                    
                  <div class="container">
                      <div class="row">
  
                        <div class="col form-group">
                          <label>Aduan Pelayanan</label>
                          {{-- <input required type="number" class="form-control" name="" id="adu_layan"> --}}
                          <select name="aduPel" id="adu_layan" class="form-control select2">
                            @foreach ($aduLayan as $item )
                            <option value="{{ $item->JmlAduan}}">{{ $item->JmlAduan}} | {{ $item->bulanTahun }}</option>
                            @endforeach
                            
                          </select>
                        </div>
                        
                        <div class="col form-group">
                          <label>Aduan Teknik</label>
                          <input required type="number" class="form-control" name="aduTek" id="aduan_teknik">
                        </div>

                        <div class="col form-group">
                          <label>Total Aduan</label>
                          <input required type="number" class="form-control" name="totAdu" id="total_aduan">
                        </div>
  
                      </div>
                    </div>
                  </fieldset><br>
              </div>

            <div class="modal-footer justify-content-between">
              <div class="float-right"><button type="submit" class="btn btn-primary">SIMPAN</button></div>
            </div>
          </form>


          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
      @include('sweetalert::alert')
@endsection
