@extends('layouts.main')

@section('title')
  EVKIN | DASHBAORAD
@endsection


@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <h1 class="m-0 text-center">DATA ADMINSTRASI</h1>
  </div>
  <!-- /.content-header -->
  <div class="content">
    <div class="float-right">
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-adm" id="tambah_adm">Tambah Data ADMINISTRASI</button>
    </div>
  <br><br>
                                <table class="table table-striped responsive" id="tbl">
                                    <thead>
                                        <tr>
                                            <th>NO</th>
                                            <th class="text-wrap" style="width: 200px;">RENCANA JANGKA PANJANG</th>
                                            <th class="text-wrap" style="width: 200px;">PROSUDUR OPERASI STANDAR</th>
                                            <th class="text-wrap" style="width: 200px;">RENCANA PENILAIAN KINERJA KARYAWAN</th>
                                            <th class="text-wrap" style="width: 200px;">RENCANA KERJA DAN ANGGARAN PERUSAHAAN</th>
                                            
                                            <th>BULAN TAHUN</th>
                                            <th>STATUS</th>
                                            <th>-</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    {{-- @foreach($adm as $item)
                                      <tr>
                                        <td>{{ $no ++}}</td>
                                        <td>{{ number_format($item->rjp, 0) }}</td>
                                        <td>{{ number_format($item->pos, 0) }}</td>
                                        <td>{{ number_format($item->rpkk, 0) }}</td>
                                        <td>{{ number_format($item->rkap, 0) }}</td>
                                        
                                        <td>{{ \Carbon\Carbon::parse($item->bulanTahun)->translatedFormat('F Y') }}</td>
                                        
                                        
                                        <td>
                                        <div class="btn-group">
                                                      <button type="button" class="btn btn-default">Action</button>
                                                      <button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown" aria-expanded="false">
                                                        <span class="sr-only">Toggle Dropdown</span>
                                                      </button>
                                                      <div class="dropdown-menu" role="menu" style="">
                                                        <a class="dropdown-item" href="#" data-id="{{ $item->id }}" id="edit_adm">Edit</a>
                                                        <form action="/delAdm/{{ $item->id }}" method="POST" style="display:inline;">
                                                          @csrf
                                                          
                                                          <a class="dropdown-item" href="#" onclick="event.preventDefault(); 
                                                              if (confirm('Apakah {{ auth()->user()->name}} yakin ingin menghapus data  {{ \Carbon\Carbon::parse($item->bulanTahun)->translatedFormat('F Y') }} ?')) {  
                                                                  this.closest('form').submit(); 
                                                              }">Hapus</a>
                                                      </form>
                                                      </div>
                                                    </div>
                                        </td>
                                      </tr>
                                      @endforeach --}}
                                    </tbody>
                                </table>
                              </div>
                            </div>

      <div class="modal fade" id="modal-adm">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"  id="judul_adm">Input Data ADMINISTRASI</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">


              <form action="/sdmSave" method="POST" id="form-adm">
                @csrf
                <input required type="hidden" id="idAdm" name="idAdm" class="form-control">
              <fieldset class="border border-primary rounded">
                <legend class="ml-2 w-auto px-3 border border-primary rounded"><h6>RENCANA JANGKA PANJANG</h6></legend>
                  
                <div class="container">
                    <div class="row">
                      <div class="col form-group">
                        
                        <select name="rjp" id="rjp" class="form-control">
                          <option value="">Belum Memiliki</option>
                          <option value="">Memiliki,Belum dipedomani</option>
                          <option value="">Sebagian Dipedomani</option>
                          <option value="">Sepenuhnya Dipedomani</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </fieldset><br>

                <fieldset class="border border-success rounded">
                <legend class="ml-2 w-auto px-3 border border-success rounded"><h6>PROSUDUR OPERASI STANDAR</h6></legend>
                  
                <div class="container">
                    <div class="row">
                    <div class="col form-group">
                        
                        <select name="pos" id="pos" class="form-control">
                          <option value="">Belum Memiliki</option>
                          <option value="">Memiliki,Belum dipedomani</option>
                          <option value="">Sebagian Dipedomani</option>
                          <option value="">Sepenuhnya Dipedomani</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </fieldset><br>

                <fieldset class="border border-info rounded">
                <legend class="ml-2 w-auto px-3 border border-info rounded" style="display:flex; justify-content:flex-end; align-items:center;"><h6>RENCANA PENILAIAN KINERJA KARYAWAN</h6></legend>
                  
                <div class="container">
                    <div class="row">
                    <div class="col form-group">
                        
                        <select name="rpkk" id="rpkk" class="form-control">
                          <option value="">Belum Memiliki</option>
                          <option value="">Memiliki,Belum dipedomani</option>
                          <option value="">Sebagian Dipedomani</option>
                          <option value="">Sepenuhnya Dipedomani</option>
                        </select>
                      </div>

                    </div>
                  </div>
                </fieldset><br>

                <fieldset class="border border-info rounded">
                <legend class="ml-2 w-auto px-3 border border-info rounded" style="display:flex; justify-content:flex-end; align-items:center;"><h6>RENCANA KERJA DAN ANGGARAN PERUSAHAAN</h6></legend>
                  
                <div class="container">
                    <div class="row">
                    <div class="col form-group">
                        
                        <select name="rkap" id="rkap" class="form-control">
                          <option value="">Belum Memiliki</option>
                          <option value="">Memiliki,Belum dipedomani</option>
                          <option value="">Sebagian Dipedomani</option>
                          <option value="">Sepenuhnya Dipedomani</option>
                        </select>
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
      @include('sweetalert::alert')
@endsection
