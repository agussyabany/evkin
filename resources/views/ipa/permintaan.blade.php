@extends('layouts.main')

@section('title')
  EVKIN | DASHBAORAD
@endsection

@section('content')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <h1 class="m-0 text-center">PERMINTAAN BAHAN KIMIA </h1>
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
    <legend class="ml-2 w-auto px-3 border border-primary rounded"><h6>PERMINTAAN BAHAN KIMIA</h6></legend>
    <div class="container">
        <div class="table-responsive pompa-table">
                                              <table class="table table-bordered table-striped table-sm masuk">
                                                  <thead class="thead-dark text-center">
                                                      <tr class="text-center">
                                                          <th class="text-center">NO</th>
                                                          <th class="text-center">NO PERMINTAAN</th>
                                                          <th class="text-center">IPA</th>
                                                          <th class="text-center">DAJUKAN OLEH</th>
                                                          <th class="text-center">TANGGAL</th>
                                                          <th class="text-center">STATUS</th>
                                                          <th class="text-center">DETAIL</th>
                                                      </tr>
                                                  </thead>
                                                  <tbody>
                                                   @foreach ($permintaan as $item )
                                                   <tr>
                                                          <td class="text-center">{{$loop->iteration}}</td>
                                                          <td>{{$item->no_permintaan}}</td>
                                                          <td>{{$item->ipa->nama_ipa}}</td>
                                                          <td>{{$item->user->name}}</td>
                                                          <td>{{$item->created_at}}</td>
                                                          <td>{{$item->statusRelasi->nama_status}}</td>
                                                          
                                                          <td><button class="btn btn-outline-success btn-sm btn-info-minta" data-id="{{$item->id}}"><i class="fa fa-eye"></i></button></td>
                                                      </tr>
                                                     @endforeach 
                                                    
                                                   
                                                     
                                                  </tbody>
                                              </table>
                                          </div>
                                        </div>
       
                                          


</fieldset><br>






  
 


</div>
</div>

    

      <div class="modal fade" id="modalDetailMinta" tabindex="-1">
        <div class="modal-dialog modal-lg ">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"  id="">Data Permintaan Bahan Kimia</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                {{-- IDENTITAS TRANSAKSI --}}
                <fieldset class="border border-primary rounded p-2 mb-3">
                    <legend class="w-auto px-3"><b>Identitas Permintaan</b></legend>

                    <div class="row">
                      <div class="col">
                        <table class="table table-sm table-bordered table-head-white">
                        <tr>
                            <th width="20%">NO</th>
                            <td id="m_no_transaksi"></td>
                        </tr>
                        <tr>
                            <th width="20%">IPA</th>
                            <td id="m_ipa"></td>
                        </tr>
                          <tr>
                            <th width="20%">TANGGAL</th>
                            <td id="m_tanggal"></td>
                        </tr>
                        </table>

                      </div>
                      <div class="col">
                        <table class="table table-sm table-bordered table-head-white">
                        <tr>
                            <th>STATUS</th>
                            <td id="m_status"></td>
                        </tr>
                        @role(['agus','ipa'])
                          @if(Auth::user()->jabatan == 2)
                              <tr>
                                  <th>PERSETUJUAN ASMEN IPA</th>
                                  <td>
                                   
                                      
                                    
                                    <form method="POST" id="formApprove" action="" onsubmit="return confirm('Setujui permintaan ini?')">
                                        @csrf
                                        <input type="hidden" value="2" name="status">
                                        <button class="btn btn-outline-success btn-sm" id="btn-asmen-ipa">
                                            PROSES
                                        </button>
                                    </form>
                                  
                                </td>
                              </tr>
                          @endif
                      @endrole
                      @role(['agus','gudang'])
                          @if(Auth::user()->jabatan == 2)
                              <tr>
                                  <th>PERSETUJUAN <br> ASMAN GUDANG</th>
                                  <td>
                                   
                                      
                                    
                                    <form method="POST" id="formApprove" action="" onsubmit="return confirm('Setujui permintaan ini?')">
                                        @csrf
                                        <input type="hidden" value="3" name="status">
                                        <button class="btn btn-outline-success btn-sm" id="btn-asmen-gd">
                                            PROSES
                                        </button>
                                    </form>
                                  
                                </td>
                              </tr>
                          @endif
                      @endrole
                      @role(['agus','gudang'])
                          @if(Auth::user()->jabatan == 1)
                              <tr>
                                  <th>DIMUAT</th>
                                  <td>
                                   
                                      
                                    
                                    <form method="POST" id="formApprove" action="" onsubmit="return confirm('Setujui permintaan ini?')">
                                        @csrf
                                        <input type="hidden" value="4" name="status">
                                        <button class="btn btn-outline-success btn-sm" id="btn-op-gd">
                                            PROSES
                                        </button>
                                    </form>
                                  
                                </td>
                              </tr>
                          @endif
                      @endrole
                    </table>

                      </div>
                    </div>

                    
                        
                </fieldset>
                <fieldset class="border border-primary rounded p-2 mb-3">
                <legend class="w-auto px-3"><h6>Detail Permintaan</h6></legend>
                    <table class="table table-sm table-bordered">
                    <thead class="thead-dark text-center">
                        <tr>
                           <table class="table table-bordered table-sm text-center ">
                              <thead class="bg-light">
                                  <tr>
                                      <th rowspan="2">NO</th>
                                      <th rowspan="2">BAHAN</th>
                                      <th colspan="2" class="bg-primary">PERMINTAAN</th>
                                      <th colspan="2" class="bg-success">DIKIRIM</th>
                                      <th colspan="2" class="bg-info">DITERIMA</th>
                                      
                                      <th rowspan="2">SATUAN</th>
                                      <th rowspan="2" class="th-gudang d-none bg-warning">Stok Gudang</th>
                                      <th rowspan="2">KET</th>
                                      @role(['agus','ipa'])
                                        @if(Auth::user()->jabatan == 1)
                                          <th rowspan="2">JUMLAH DIKIRIM</th>
                                        @endif
                                      @endrole
                                  </tr>
                                  <tr>
                                      <th>JUMLAH</th>
                                      <th>KILO</th>
                                      <th>JUMLAH</th>
                                      <th>KILO</th>
                                      <th>JUMLAH</th>
                                      <th>KILO</th>
                                  </tr>
                              </thead>
                           
                            
                        </tr>
                    </thead>
                    <tbody id="tblDetailMinta">
                        <!-- diisi jquery -->
                    </tbody>
                </table>
                </fieldset><br>
              </div>
            <div class="modal-footer">
                <div class="float-end">
                    <button class="btn btn-primary" id="btn-submit-kirim">SUBMIT</button>
                </div>
                @role(['agus','ipa'])
                    @if(Auth::user()->jabatan == 1)
                      <div class="float-end ">
                          <button class="btn btn-primary" id="btn-submit-terima-ipa">KIRIM</button>
                      </div>
                    @endif
                @endrole
                
            </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
    </div>
      <!-- /.modal -->
      <!-- /.modal -->
      @include('sweetalert::alert')
<script>
    window.isGudangOperator = @json(
        auth()->user()->jabatan == 1 && auth()->user()->hasAnyRole(['agus','gudang'])
    );

     window.isIpaOperator = @json(
        auth()->user()->jabatan == 1 && auth()->user()->hasAnyRole(['agus','ipa'])
    );
</script>
@endsection
