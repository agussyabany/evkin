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
    <legend class="ml-2 w-auto px-3 border border-primary rounded"><h6>PENERIMAAN BAHAN KIMIA</h6></legend>
    <div class="container">
        <div class="table-responsive pompa-table">
                                              <table class="table table-bordered table-striped table-sm masuk">
                                                  <thead class="thead-dark text-center">
                                                      <tr>
                                                          <th>NO</th>
                                                          <th>NO TRANSAKSI</th>
                                                          <th>SUPLIER</th>
                                                          <th>FAKTUR</th>
                                                          <th>TANGGAL FAKTUR</th>
                                                          <th>TANGGAL</th>
                                                          <th>AKSI</th>
                                                      </tr>
                                                  </thead>
                                                  <tbody>
                                                    @foreach ($transaksi as $item )
                                                     <tr>
                                                          <td class="text-center">{{ $loop->iteration}}</td>
                                                          <td>{{$item->no_transaksi}}</td>
                                                          <td>{{$item->supplier}}</td>
                                                          <td>{{$item->faktur}}</td>
                                                          <td>{{$item->tgl_faktur}}</td>
                                                          <td>{{$item->created_at}}</td>
                                                          <td><button class="btn btn-outline-success btn-sm btn-info-trx" data-id="{{$item->id}}"><i class="fa fa-eye"></i></button></td>
                                                      </tr>
                                                      
                                                    @endforeach
                                                   
                                                     
                                                  </tbody>
                                              </table>
                                          </div>
                                        </div>
       
                                          


</fieldset><br>






  
 


</div>
</div>

    

      <div class="modal fade" id="modalDetailMasuk" tabindex="-1">
        <div class="modal-dialog modal-lg ">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"  id="judul_ipa">Data Bahan Kimia Masuk</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                {{-- IDENTITAS TRANSAKSI --}}
                <fieldset class="border border-primary rounded p-2 mb-3">
                    <legend class="w-auto px-3"><b>Identitas Transaksi</b></legend>

                    <table class="table table-sm table-bordered mb-0">
                        <tr>
                            <th width="20%">No Transaksi</th>
                            <td id="d_no_transaksi"></td>
                            <th width="20%">Tanggal</th>
                            <td id="d_tanggal"></td>
                        </tr>
                        <tr>
                            <th>Faktur</th>
                            <td id="d_faktur"></td>
                            <th>Supplier</th>
                            <td id="d_supplier"></td>
                        </tr>
                    </table>
                </fieldset>
                <fieldset class="border border-primary rounded p-2 mb-3">
                <legend class="w-auto px-3"><h6>Detail Transaksi</h6></legend>
                    <table class="table table-sm table-bordered">
                    <thead class="thead-dark text-center">
                        <tr>
                            <th>No</th>
                            <th>Bahan</th>
                            <th>Jumlah</th>
                            <th>Satuan</th>
                            <th>Kg</th>
                        </tr>
                    </thead>
                    <tbody id="tblDetailMasuk">
                        <!-- diisi jquery -->
                    </tbody>
                </table>
                </fieldset><br>
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
