@extends('layouts.main')

@section('title')
  EVKIN | DASHBAORAD
@endsection

@section('content')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <h1 class="m-0 text-center">GUDANG IPA {{Auth::user()->ipaRelasi->nama_ipa}}</h1>
  </div>
  <!-- /.content-header -->
  <div class="content">
    <div class="float-right">
      @if (Auth::user()->hasAnyRole(['gudang','agus','ipa']))
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalMasuk" id="tambah_ipa">TAMBAH</button>
      @endif
    </div>
  <br><br>

  <fieldset class="border border-primary rounded">
    <legend class="ml-2 w-auto px-3 border border-primary rounded"><h6>STOK GUDANG</h6></legend>
    <div class="container">
        <div class="table-responsive pompa-table">
                                              <table class="table table-bordered table-striped table-sm">
                                                  <thead class="thead-dark text-center">
                                                      <tr>
                                                          <th>NO</th>
                                                          <th>Bahan</th>
                                                          <th>Jumlah</th>
                                                          <th>Satuan</th>
                                                          <th>Kilo</th>
                                                      </tr>
                                                  </thead>
                                                  <tbody>
                                                    @foreach ($stok as $item )
                                                        
                                                    
                                                      <tr>
                                                          <td class="text-center">{{ $loop->iteration}}</td>
                                                          <td>{{ $item->bahan->nama_bahan}}</td>
                                                          <td>{{ $item->stok}}</td>
                                                          <td>{{ $item->bahan->satuan->nama_satuan}}</td>
                                                          <td>{{ $item->bahan->ukuran * $item->stok }}</td>
                                                      </tr>
                                                      @endforeach
                                                  </tbody>
                                              </table>
                                          </div>
                                        </div>
       
                                          


</fieldset><br>






  
 


</div>
</div>

    

      <div class="modal fade" id="modalMasuk">
        <div class="modal-dialog modal-lg ">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"  id="judul_ipa">Input Bahan Kimia Keluar</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form id="formKeluar">
                  <table class="table table-bordered">
                      <thead>
                          <tr>
                              <th>No</th>
                              <th>Bahan</th>
                              <th>Stok</th>
                              <th>Satuan</th>
                              <th>Keluar</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach($stok as $i => $s)
                          <tr>
                              <td>{{ $i+1 }}</td>
                              <td>{{ $s->bahan->nama_bahan }}</td>
                              <td>{{ $s->stok }}</td>
                              <td>{{ $s->bahan->satuan->nama_satuan }}</td>
                              <td>
                                  <input type="number"
                                      class="form-control qty"
                                      data-id_bahan="{{ $s->id_bahan }}"
                                      data-id_satuan="{{ $s->bahan->id_satuan }}"
                                      max="{{ $s->stok }}"
                                      min="0"
                                  >
                              </td>
                          </tr>
                          @endforeach
                      </tbody>
                  </table>





            </div>
            <div class="modal-footer">
                <div class="float-end">
                    <button type="button" id="btn-submit" class="btn btn-success">SIMPAN</button>
                </div>
          </form>
            </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
    </div>
      <!-- /.modal -->
      <!-- /.modal -->
      @include('sweetalert::alert')

@endsection
