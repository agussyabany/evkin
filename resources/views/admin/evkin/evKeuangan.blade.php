@extends('layouts.main')

@section('title')
  EVKIN | DASHBAORAD
@endsection

@section('content')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <h1 class="m-0 text-center">KEUANGAN</h1>
  </div>
  <!-- /.content-header -->
  <div class="content">
    <div class="float-right">
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_evkeu" id="tambah_keu">Tambah Data Keuangan</button>
    </div>
  <br><br>

  <fieldset class="border border-primary rounded">
    <legend class="ml-2 w-auto px-3 border border-primary rounded"><h6>ASPEK KEUANGAN</h6></legend>
 <div class="row">
    
    <div class="col">
        <div class="card">
          <div class="card-header"></div>
          <div class="card-body">
            <table class="table table-bordered">
              <thead>
                  <tr>
                      <th>NO</th>
                      <th>Laba Setelah Pajak</th>
                      <th>Jumlah Ekuitas</th>
                      <th>Biaya Operasi</th>
                      <th>Pendapatan Operasi</th>
                      <th>Kas + Setara Kas</th>
                      <th>Hutang Lancar</th>
                      <th>Total Aktiva</th>
                      <th>Total Hutang</th>
                      <th>Penerimaan Rekening Air</th>
                      <th>Rekening Air</th>
                      <th>Periode</th>
                      <th>Status</th>
                      <th>-</th>
                  </tr>
              </thead>
              <tbody id="summary-table-body">
                
                 @foreach ($keuangan as $item)
                   
                  
               
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ number_format($item->labaStlPjk, 0) }}</td>
                  <td>{{ number_format($item->jmlEkuitas, 0) }}</td>
                  <td>{{ number_format( $item->biayaOps, 0) }}</td>
                  <td>{{ number_format($item->PndptnOps, 0) }}</td>
                  <td>{{ number_format($item->kaStrkas, 0) }}</td>
                  <td>{{ number_format($item->HutangLancar, 0) }}</td>
                  <td>{{ number_format($item->JmlPnrmRekAir, 0) }}</td>
                  <td>{{ number_format($item->jmlRekAir, 0) }}</td>
                  <td>{{ number_format($item->TotalAktiva, 0) }}</td>
                  <td>{{ number_format($item->TotalHutang, 0) }}</td>
                  <td>{{ \Carbon\Carbon::parse($item->bulanTahun)->translatedFormat('F Y') }}</td>
                  
                    
                    <td>
                      @if ($item->status == 0)
                          <span style="color: rgb(225, 236, 15);">POST</span>
                      @else
                          <span style="color: rgb(14, 244, 6);">VERIFIED</span>
                      @endif
                  </td>
                    <td><div class="btn-group">
                      <button type="button" class="btn btn-default btn-sm">Action</button>
                      <button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown" aria-expanded="false">
                        <span class="sr-only">Toggle Dropdown</span>
                      </button>
                      <div class="dropdown-menu" role="menu" style="">
                        <a class="dropdown-item" href="#" data-id="{{$item->id}}" id="edit_keu">Edit</a>
                        <form action="/verKeu/{{ $item->id }}" method="POST" style="display:inline;">
                          @csrf
                          
                          <a class="dropdown-item" href="#" onclick="event.preventDefault(); 
                              if (confirm('Apakahyakin ingin memverifikasi  data  {{ \Carbon\Carbon::parse()->translatedFormat('F Y') }} ?')) {  
                                  this.closest('form').submit(); 
                              }">Verifikasi</a>
                       </form>
                        <form action="/delKeu/{{ $item->id }}" method="POST" style="display:inline;">
                          @csrf
                          
                          <a class="dropdown-item" href="#" onclick="event.preventDefault(); 
                              if (confirm('Apakahyakin ingin menghapus data  {{ \Carbon\Carbon::parse($item->bulanTahun)->translatedFormat('F Y') }} ?')) {  
                                  this.closest('form').submit(); 
                              }">Hapus</a>
                       </form>
                      </div>
                      </div>
                    </td>
                    
                </tr>
                @endforeach
              </tbody>
          </table>

          </div>
        </div>
        
    </div>
</div>

</fieldset><br>


{{-- DATA BULANAN --}}



  
 


</div>

    

      <div class="modal fade" id="modal_evkeu">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"  id="judul_evkeu">Input Data Keuangan</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">


              <form action="/keuSave" method="POST" id="form-keuangan">
                @csrf
                <input required type="hidden" id="idKeu" name="idKeu" class="form-control">
              <fieldset class="border border-primary rounded">
                <legend class="ml-2 w-auto px-3 border border-primary rounded"><h6>Retun Of Equity</h6></legend>
                  
                <div class="container">
                    <div class="row">
                      <div class="col form-group">
                        <label >Laba Setelah Pajak</label>
                        <input required type="number" class="form-control" name="labaStlPjk" id="labaStlPjk">
                      </div>

                      <div class="col form-group">
                        <label >Jumlah Kualitas</label>
                        <input required type="number" class="form-control" name="jmlEkuitas" id="jmlEkuitas">
                      </div>
                    </div>
                  </div>
                </fieldset><br>

                <fieldset class="border border-success rounded">
                <legend class="ml-2 w-auto px-3 border border-success rounded"><h6>Ratio Operasional</h6></legend>
                  
                <div class="container">
                    <div class="row">
                      <div class="col form-group">
                        <label >Biaya Operasi</label>
                        <input required type="number" class="form-control" name="biayaOps" id="biayaOps">
                      </div>

                      <div class="col form-group">
                        <label>Pendapatan Operasi</label>
                        <input required type="number" class="form-control" name="PndptnOps" id="PndptnOps">
                      </div>
                    </div>
                  </div>
                </fieldset><br>

                <fieldset class="border border-info rounded">
                <legend class="ml-2 w-auto px-3 border border-info rounded" style="display:flex; justify-content:flex-end; align-items:center;"><h6>Ratio Kas</h6></legend>
                  
                <div class="container">
                    <div class="row">
                      <div class="col form-group">
                        <label >Kas + Setara Kas</label>
                        <input required type="number" class="form-control" name="kaStrkas" id="kaStrkas">
                      </div>

                      <div class="col form-group">
                        <label >Hutang Lancar</label>
                        <input required type="number" class="form-control" name="HutangLancar" id="HutangLancar">
                      </div>
                    </div>
                  </div>
                </fieldset><br>

                <fieldset class="border border-warning rounded">
                <legend class="ml-2 w-auto px-3 border border-warning rounded" style="display:flex; justify-content:flex-end; align-items:center;"><h6>Efektivitas Penagihan</h6></legend>
                  
                <div class="container">
                    <div class="row">
                      <div class="col form-group">
                        <label>Jumlah Penerimaan Rekening Air</label>
                        <input required type="number" class="form-control" name="JmlPnrmRekAir" id="JmlPnrmRekAir">
                      </div>

                      <div class="col form-group">
                        <label>Jumlah Rekening Air</label>
                        <input required type="number" class="form-control" name="jmlRekAir" id="jmlRekAir">
                      </div>
                    </div>
                  </div>
                </fieldset><br>


                <fieldset class="border border-secondary rounded">
                <legend class="ml-2 w-auto px-3 border border-secondary rounded" style="display:flex; justify-content:flex-end; align-items:center;"><h6>Solvabilitas</h6></legend>
                  
                <div class="container">
                    <div class="row">

                      <div class="col form-group">
                        <label>Total Aktiva</label>
                        <input required type="number" class="form-control" name="TotalAktiva" id="TotalAktiva">
                      </div>

                      <div class="col form-group">
                        <label>Total Hutang</label>
                        <input required type="number" class="form-control" name="TotalHutang" id="TotalHutang">
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
      <!-- /.modal -->
      @include('sweetalert::alert')

@endsection
