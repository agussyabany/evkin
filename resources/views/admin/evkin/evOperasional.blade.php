@extends('layouts.main')

@section('title')
  EVKIN | DASHBAORAD
@endsection

@section('content')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <h1 class="m-0 text-center">PRODUKSI</h1>
  </div>
  <!-- /.content-header -->
  <div class="content">
    <div class="float-right">
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_operasional" id="tambah_prod">Tambah Data</button>
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
                <th class="text-wrap" style="width: 200px;">Volume Produksi Riil</th>
                <th class="text-wrap" style="width: 200px;">Jumlah Kapasitas Terpasang</th>
                <th class="text-wrap" style="width: 200px;">Air Disistribusikan - Air Terjual</th>
                <th class="text-wrap" style="width: 200px;">Jumlah Air Didistribusikan</th>
                <th class="text-wrap" style="width: 200px;">Jumlah Waktu Pelayanan/Distribusi Air ke Pelanggan dalam Sebulan</th>
                <th>Jumlah Hari</th>
                <th>Jumlah Pelanggan yang Dilayanai dengan Tekanan > 0,7 Bar</th>
                <th class="text-wrap" style="width: 200px;">Jumlah Pelanggan Aktiv</th>
                <th>Jml Meter yg diganti/kalibrasi dalam setahun</th>
                <th>Bulan Tahun</th>
                <th>Status</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        @foreach($operasional as $item)
          <tr>
            <td>{{ $loop->iteration}}</td>
            <td>{{ number_format($item->VolProdRil, 0) }}</td>
            <td>{{ number_format($item->KpstsTrpsng, 0) }}</td>
            <td>{{ number_format($item->KalkulasiJumAir, 0) }}</td>
            <td>{{ number_format($item->JmlAirDist, 0) }}</td>
            <td>{{ number_format($item->JmlWktPly, 0) }}</td>
            <td>{{ number_format($item->hari, 0) }}</td>
            <td>{{ number_format($item->Plgnlayan, 0) }}</td>
            <td>{{ number_format($item->PlgnAktiv, 0) }}</td>
            <td>{{ number_format($item->MtrAirGnti, 0) }}</td>
            <td>{{ \Carbon\Carbon::parse($item->bulanTahun)->translatedFormat('F Y') }}</td>
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
                          <form action="/verOp/{{ $item->id }}" method="POST" style="display:inline;">
                            @csrf
                            
                            <a class="dropdown-item" href="#" onclick="event.preventDefault(); 
                                if (confirm('Apakah  yakin ingin memverivikasi data  {{ \Carbon\Carbon::parse($item->bulanTahun)->translatedFormat('F Y') }} ?')) {  
                                    this.closest('form').submit(); 
                                }">Verifikasi</a>
                        </form>
                          </div>
                        </div>
            </td>
            
          </tr>
          @endforeach
          <tr>
            <td><strong>TOT</strong></td>
            <td><strong>{{number_format($VolProdRil)}}</strong></td>
            <td><strong>{{number_format($KpstsTrpsng)}}</strong></td>
            <td><strong>{{number_format($KalkulasiJumAir)}}</strong></td>
            <td><strong>{{number_format($JmlAirDist)}}</strong></td>
            <td><strong>{{number_format($JmlWktPly)}}</strong></td>
            <td><strong>{{number_format($hari)}}</strong></td>
            <td></td>
            <td></td>
            
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
                        <input required type="number" class="form-control" name="VolProdRil" id="VolProdRil">
                      </div>

                      <div class="col form-group">
                        <label >Jumlah Kapasitas Terpasang</label>
                        <input required type="number" class="form-control" name="KpstsTrpsng" id="KpstsTrpsng">
                      </div>
                    </div>
                  </div>
                </fieldset><br>

                <fieldset class="border border-success rounded">
                <legend class="ml-2 w-auto px-3 border border-success rounded"><h6>Kehilangan Air</h6></legend>
                  
                <div class="container">
                    <div class="row">
                      <div class="col form-group">
                        <label >Air Disistribusikan - Air Terjual</label>
                        <input required type="number" class="form-control" name="KalkulasiJumAir" id="KalkulasiJumAir">
                      </div>

                      <div class="col form-group">
                        <label>Jumlah Air Didistribusikan</label>
                        <input required type="number" class="form-control" name="JmlAirDist" id="JmlAirDist">
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
