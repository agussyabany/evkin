@extends('layouts.main')

@section('title')
  EVKIN | DASHBAORAD
@endsection

@section('content')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <h1 class="m-0 text-center">HUBUNGAN PELANGGAN</h1>
  </div>
  <!-- /.content-header -->
  <div class="content">
    <div class="float-right">
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_pelayanan" id="tambah_pelayanan">Tambah Data</button>
    </div>
  <br><br>

  <fieldset class="border border-primary rounded">
    
    <legend class="ml-2 w-auto px-3 border border-primary rounded">ASPEK PELAYANAN</legend>
    <div class="content">
    <table class="table table-striped responsive" id="tbl">
      <thead>
          <tr>
              <th>NO</th>
              <th>Penduduk Terlayani</th>
              <th>Penduduk wilayah</th>
              <th>Aduan Selesai</th>
              <th>Aduan</th>
              <th>Uji Kualitas Memenuhi Syarat</th>
              <th>Titik yg Diuji</th>
              <th>Air terjualplgn.domestik</th>
              <th>Pelanggan Domestik</th>
              <th>Kalkulasi Jml Plgn</th>
              <th>Plgn Th Lalu</th>
              <th>Pelanggan Tahun Lalu</th>
              <th>Periode</th>
              <th>Status</th>
              <th>-</th>
              
          </tr>
      </thead>
      <tbody>
      @foreach($pelayanan as $item)
        <tr>
          <td>{{ $loop->iteration}}</td>
          <td>{{ number_format($item->JmlPnddkTrlyni, 0) }}</td>
          <td>{{ number_format($item->jmlPndkWil, 0) }}</td>
          <td>{{ number_format($item->AduanSlsai, 0) }}</td>
          <td>{{ number_format($item->JmlAduan, 0) }}</td>
          <td>{{ number_format($item->UjiKualitas, 0) }}</td>
          <td>{{ number_format($item->titikUji, 0) }}</td>
          <td>{{ number_format($item->JmlAirTrjualDom, 0) }}</td>
          <td>{{ number_format($item->JmlPlgnDom, 0) }}</td>
          <td>{{ number_format($item->kalKulasiJmlPlgn, 0) }}</td>
          <td>{{ number_format($item->JmlPlgnThLl, 0) }}</td>
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
                          <a class="dropdown-item" href="#" data-id="{{ $item->id }}" id="edit_pelayanan">Edit</a>
                          <form action="/delPel/{{ $item->id }}" method="POST" style="display:inline;">
                            @csrf
                            
                            <a class="dropdown-item" href="#" onclick="event.preventDefault(); 
                                if (confirm('Apakah  yakin ingin menghapus data  {{ \Carbon\Carbon::parse($item->bulanTahun)->translatedFormat('F Y') }} ?')) {  
                                    this.closest('form').submit(); 
                                }">Hapus</a>
                        </form>
                        <form action="/verPel/{{ $item->id }}" method="POST" style="display:inline;">
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
      </tbody>
  </table>
</div>
  </fieldset>

  
{{-- DATA BULANAN --}}









</div>


</div>
</div>

      
      <div class="modal fade" id="modal_pelayanan">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"  id="judul_pelayanan">Input Data Pelayanan</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">


              <form action="/pelSave" method="POST" id="form-pelayanan">
                @csrf
                <input required type="hidden" id="idPel" name="idPel" class="form-control">
              <fieldset class="border border-primary rounded">
                <legend class="ml-2 w-auto px-3 border border-primary rounded"><h6>CAKUPAN PELAYANAN TEKNIS</h6></legend>
                  
                <div class="container">
                    <div class="row">
                      <div class="col form-group">
                        <label >Jumlah Penduduk Terlayani</label>
                        <input required type="number" class="form-control" name="JmlPnddkTrlyni" id="JmlPnddkTrlyni">
                      </div>

                      <div class="col form-group">
                        <label >Jumlah penduduk wilayah pelayanan</label>
                        <input required type="number" class="form-control" name="jmlPndkWil" id="jmlPndkWil">
                      </div>
                    </div>
                  </div>
                </fieldset><br>

                <fieldset class="border border-success rounded">
                <legend class="ml-2 w-auto px-3 border border-success rounded"><h6>PENEYELESAIAN PENGADUAN</h6></legend>
                  
                <div class="container">
                    <div class="row">
                      <div class="col form-group">
                        <label >Pengaduan Selesai Ditangani</label>
                        <input required type="number" class="form-control" name="AduanSlsai" id="AduanSlsai">
                      </div>

                      <div class="col form-group">
                        <label>Jumlah Pengaduan</label>
                        <input required type="number" class="form-control" name="JmlAduan" id="JmlAduan">
                      </div>
                    </div>
                  </div>
                </fieldset><br>

                <fieldset class="border border-info rounded">
                <legend class="ml-2 w-auto px-3 border border-info rounded" style="display:flex; justify-content:flex-end; align-items:center;"><h6>KONSUMSI AIR DOMESTIK</h6></legend>
                  
                <div class="container">
                    <div class="row">
                      <div class="col form-group">
                        <label> Jml air yg terjual pada pel.domestik</label>
                        <input required type="number" class="form-control" name="JmlAirTrjualDom" id="JmlAirTrjualDom">
                      </div>

                      <div class="col form-group">
                        <label >Jumlah Pelanggan Domestik</label>
                        <input required type="number" class="form-control" name="JmlPlgnDom" id="JmlPlgnDom">
                      </div>
                    </div>
                  </div>
                </fieldset><br>

                <fieldset class="border border-warning rounded">
                <legend class="ml-2 w-auto px-3 border border-warning rounded" style="display:flex; justify-content:flex-end; align-items:center;"><h6>KUALIATAS AIR PELANGGAN</h6></legend>
                  
                <div class="container">
                    <div class="row">
                      <div class="col form-group">
                        <label>Jml Uji Kualitas Yg Memenuhi Syarat</label>
                        <input required type="number" class="form-control" name="UjiKualitas" id="UjiKualitas">
                      </div>

                      <div class="col form-group">
                        <label>Jumlah Titik yg Diuji atau Titik Minimal</label>
                        <input required type="number" class="form-control" name="titikUji" id="titikUji">
                      </div>
                    </div>
                  </div>
                </fieldset><br>


                <fieldset class="border border-secondary rounded">
                <legend class="ml-2 w-auto px-3 border border-secondary rounded" style="display:flex; justify-content:flex-end; align-items:center;"><h6>PERTUMBUHAN PELANGGAN</h6></legend>
                  
                <div class="container">
                    <div class="row">

                      <div class="col form-group">
                        <label>Jumlah Pelanggan Tahun ini - Jumlah Pelanggan Tahun Lalu</label>
                        <input required type="number" class="form-control" name="kalKulasiJmlPlgn" id="kalKulasiJmlPlgn">
                      </div>

                     

                      <div class="col form-group">
                        <label>Jumlah Pelanggan Tahun Lalu</label>
                        <input required type="text" class="form-control" name="JmlPlgnThLl" id="JmlPlgnThLl">
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
