@extends('layouts.main')

@section('title')
  EVKIN | DASHBAORAD
@endsection

@section('content')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <h1 class="m-0 text-center">SUMBER DAYA MANUSIA</h1>
  </div>
  <!-- /.content-header -->
  <div class="content">
    <div class="float-right">
      @if (Auth::user()->hasAnyRole(['adminUmum','agus']))
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-sdm" id="tambah_sdm">Tambah Data</button>
      @endif
    </div>
  <br><br>
  <fieldset class="border border-primary rounded">
    <legend class="ml-2 w-auto px-3 border border-primary rounded"><h6>ASPEK SDM</h6></legend>
      <div class="card">
        <div class="card-header"></div>
        <div class="card-body">
          <table class="table table-striped responsive" id="tbl">
            <thead>
                <tr>
                    <th>NO</th>
                    <th class="text-wrap" style="width: 200px;">Jumlah Pagawai</th>
                    <th class="text-wrap" style="width: 200px;">(Jumlah Seluruh Pelanggan / 1000 )</th>
                    <th class="text-wrap" style="width: 200px;">Jumlah Pagawai Yang Ikut Diklat</th>
                    <th class="text-wrap" style="width: 200px;">Realisasi Biaya Diklat</th>
                    <th>Realisasi Biaya Pegawai</th>
                    <th>Bulan Tahun</th>
                    @if (Auth::user()->hasAnyRole(['adminUmum','agus','spi']))
                    <th>Status</th>
                    <th></th>
                    @endif
                </tr>
            </thead>
            <tbody>
            @foreach($sdm as $item)
              <tr>
                <td>{{ $loop->iteration}}</td>
                <td>{{ number_format($item->JmlPgwai, 0) }}</td>
                <td>{{ number_format($item->JmlPlgn1000, 0) }}</td>
                <td>{{ number_format($item->JmlPegDiklat, 0) }}</td>
                <td>{{ number_format($item->RealByDiklat, 0) }}</td>
                <td>{{ number_format($item->RealByPeg, 0) }}</td>
                <td>{{ \Carbon\Carbon::parse($item->bulanTahun)->translatedFormat('F Y') }}</td>
                @if (Auth::user()->hasAnyRole(['adminUmum','agus','spi']))
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
                                <a class="dropdown-item" href="#" data-id="{{ $item->id }}" id="edit_sdm">Edit</a>
                                <form action="/verSdm/{{ $item->id }}" method="POST" style="display:inline;">
                                  @csrf
                                  
                                  <a class="dropdown-item" href="#" onclick="event.preventDefault(); 
                                      if (confirm('Apakah  yakin ingin memverivikasi data  {{ \Carbon\Carbon::parse($item->bulanTahun)->translatedFormat('F Y') }} ?')) {  
                                          this.closest('form').submit(); 
                                      }">Verikasi</a>
                              </form>
                                <form action="/delSdm/{{ $item->id }}" method="POST" style="display:inline;">
                                  @csrf
                                  
                                  <a class="dropdown-item" href="#" onclick="event.preventDefault(); 
                                      if (confirm('Apakah  yakin ingin menghapus data  {{ \Carbon\Carbon::parse($item->bulanTahun)->translatedFormat('F Y') }} ?')) {  
                                          this.closest('form').submit(); 
                                      }">Hapus</a>
                              </form>
                              </div>
                            </div>
                </td>
                @endif
              </tr>
              @endforeach
              <tr>
                <td><strong>TOT</strong></td>
                <td></td>
                <td></td>
                <td><strong>{{number_format($JmlPegDiklat,0)}}</strong></td>
                <td><strong>{{number_format($RealByDiklat,0)}}</strong></td>
                <td><strong>{{number_format($RealByPeg,0)}}</strong></td>

              </tr>
            </tbody>
        </table>
        </div>
      </div> 

  </fieldset>
  
{{-- DATA BULANAN --}}


</div>
</div>

     
      <div class="modal fade" id="modal-sdm">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"  id="judul_sdm">Input Data SDM</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">


              <form action="/sdmSave" method="POST" id="form-sdm">
                @csrf
                <input required type="hidden" id="idSdm" name="idSdm" class="form-control">
              <fieldset class="border border-primary rounded">
                <legend class="ml-2 w-auto px-3 border border-primary rounded"><h6>RASIO PEGAWAI TERHADAP PELANGGAN</h6></legend>
                  
                <div class="container">
                    <div class="row">
                      <div class="col form-group">
                        <label>Jumlah Pagawai</label>
                        <input required type="number" class="form-control" name="JmlPgwai" id="JmlPgwai">
                      </div>

                      <div class="col form-group">
                        <label >(Jumlah Seluruh Pelanggan / 1000 )</label>
                        <input required type="number" class="form-control" name="JmlPlgn1000" id="JmlPlgn1000">
                      </div>
                    </div>
                  </div>
                </fieldset><br>

                <fieldset class="border border-success rounded">
                <legend class="ml-2 w-auto px-3 border border-success rounded"><h6>RASIO DIKLAT PEGAWAI</h6></legend>
                  
                <div class="container">
                    <div class="row">
                      <div class="col form-group">
                        <label >Jumlah Pagawai Yang Ikut Diklat</label>
                        <input required type="number" class="form-control" name="JmlPegDiklat" id="JmlPegDiklat">
                      </div>
                    </div>
                  </div>
                </fieldset><br>

                <fieldset class="border border-info rounded">
                <legend class="ml-2 w-auto px-3 border border-info rounded" style="display:flex; justify-content:flex-end; align-items:center;"><h6>RASIO BIAYA DIKLAT</h6></legend>
                  
                <div class="container">
                    <div class="row">
                      <div class="col form-group">
                        <label>Realisasi Biaya Diklat</label>
                        <input required type="number" class="form-control" name="RealByDiklat" id="RealByDiklat">
                      </div>

                      <div class="col form-group">
                        <label >Realisasi Biaya Pegawai</label>
                        <input required type="number" class="form-control" name="RealByPeg" id="RealByPeg">
                      </div>

                      <div class="col form-group">
                        <label>Bulan Tahun</label>
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
      <!-- /.modal -->
      @include('sweetalert::alert')
@endsection
