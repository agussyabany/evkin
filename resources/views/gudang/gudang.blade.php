@extends('layouts.main')

@section('title')
  EVKIN | DASHBAORAD
@endsection

@section('content')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <h1 class="m-0 text-center">GUDANG</h1>
  </div>
  <!-- /.content-header -->
  <div class="content">
    <div class="float-right">
      @if (Auth::user()->hasAnyRole(['gudang','agus']))
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
              <h4 class="modal-title"  id="judul_ipa">Input Bahan Kimia Masuk</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <fieldset class="border border-primary rounded">
                <legend class="ml-2 w-auto px-3 border border-primary rounded"><h6>IDENTITAS TRANSAKSI</h6></legend>
                    <div class="container">
                        <!-- ================= TABLE HEADER BAHAN MASUK ================= -->
                                          <div class="table-responsive pompa-table">
                                              <table class="table table-bordered table-striped table-sm">
                                                  <thead class="thead-dark text-center">
                                                      <tr>
                                                          
                                                          <th>ID Transaksi</th>
                                                          <th>Faktur/Surat Jalan</th>
                                                          <th>Tgl</th>
                                                          <th>Suplier</th>
                                                      </tr>
                                                  </thead>
                                                  <tbody>
                                                      <tr>
                                                          <td><input id="no_transaksi" type="text" name="no_transaksi" class="form-control form-control-sm text-center"  value="" placeholder="GD-011225" readonly></td>
                                                          <td><input id="faktur" type="text" name="faktur" class="form-control form-control-sm text-center" value="" placeholder="No Faktur Surat Jalan" required></td>
                                                          <td><input id="tgl_faktur" type="date" name="tgl_faktur" class="form-control form-control-sm text-center" step="any" value="" required></td>
                                                          <td><input id="supplier" type="text" value="" name="supplier" class="form-control form-control-sm text-center" placeholder="KT 1234 BU" required></td>
                                                      </tr>
                                                  </tbody>
                                              </table>
                                          </div>

                    </div>
                </fieldset><br>
                <fieldset class="border border-primary rounded">
                <legend class="ml-2 w-auto px-3 border border-primary rounded"><h6>BAHAN</h6></legend>
                    <div class="container">
                        <table class="table table-bordered table-striped table-sm">
                                                  <tbody>
                                                      <tr>
                                                          <td> 
                                                            <input type="hidden" id="id_masuk">
                                                            <select name="" id="id_bahan" class="form-control form-control-sm">
                                                                 @foreach ($bahan as $item)
                                                                    <option 
                                                                        value="{{ $item->id }}"
                                                                        data-satuan="{{ $item->satuan->nama_satuan }}"
                                                                        data-ukuran="{{ $item->ukuran }}"
                                                                    >
                                                                        {{ $item->nama_bahan }}
                                                                    </option>
                                                                @endforeach
                                                          </td>
                                                          <td>
                                                            <input type="number" id="jumlah" name="jumlah" class="form-control form-control-sm text-center" value="" placeholder="jumlah" >
                                                          </td>
                                                          <td>
                                                                <input type="text" id="satuan" name="satuan" class="form-control form-control-sm text-center" value="" placeholder="SATUAN" readonly>
                                                          </td>
                                                          <td>
                                                             <input type="number" id="kilo" name="kilo" class="form-control form-control-sm text-center" value="" placeholder="KILOGRAM">
                                                          </td>
                                                          <td>
                                                             <button class="btn btn-primary btn-sm" id="btnTambah">Tambah</button>
                                                          </td>
                                                      </tr>
                                                  </tbody>
                                              </table>
                        
                        <div class="table-responsive pompa-table text-center">
                                              <table class="table table-bordered table-striped table-sm" id="tblBahan">
                                                  <thead class="thead-dark text-center">
                                                      <tr>
                                                          
                                                          <th>NO</th>
                                                          <th>Nama Bahan</th>
                                                          <th>Jumlah</th>
                                                          <th>Satuan</th>
                                                          <th>Kilogram</th>
                                                          <th>Aksi</th>
                                                      </tr>
                                                  </thead>
                                                  <tbody id="tblBahan"></tbody>
                                              </table>
                                          </div>
                    </div>
                </fieldset>

            </div>
            <div class="modal-footer">
                <div class="float-end">
                    <button class="btn btn-primary" id="btnFinal">SUBMIT</button>
                </div>
                
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
