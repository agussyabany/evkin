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

  <fieldset class="border border-primary rounded">
    <legend class="ml-2 w-auto px-3 border border-primary rounded"><h6>DATA KESELURUHAN</h6></legend>
          <div class="content row">
           
            
          <div class="col">
            <div class="card">
              <div class="card-header">AKUNTANSI</div>
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                      <tr>
                          <th>NO</th>
                          <th>DATA</th>
                          <th>BULAN</th>
                          <th>TAHUN</th>
                      </tr>
                  </thead>
                  <tbody id="summary-table-body">
                    <tr>
                        <td>1</td>
                        <td>Laba Setelah Pajak</td>
                        <td>0</td>
                        <td>0</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Jumlah Ekuitas</td>
                        <td>0</td>
                        <td>0</td>
                    </tr>
                    <tr>
                      <td>3</td>
                      <td>Ratio Operasional</td>
                      <td>0</td>
                      <td>0</td>
                  </tr>
                  <tr>
                    <td>4</td>
                    <td>Biaya Operasi</td>
                    <td>0</td>
                    <td>0</td>
                </tr>
                <tr>
                  <td>5</td>
                  <td>Pendapatan Operasi</td>
                  <td>0</td>
                  <td>0</td>
              </tr>
              <tr>
                <td>6</td>
                <td>Kas + Setara Kas</td>
                <td>0</td>
                <td>0</td>
            </tr>
            <tr>
              <td>7</td>
              <td>Hutang Lancar</td>
              <td>0</td>
              <td>0</td>
            </tr>
            <tr>
              <td>8</td>
              <td>Solvabilitas</td>
              <td>0</td>
              <td>0</td>
            </tr>
            <tr>
              <td>9</td>
              <td>Total Aktiva</td>
              <td>0</td>
              <td>0</td>
            </tr>
            <tr>
              <td>10</td>
              <td>Total Hutang</td>
              <td>0</td>
              <td>0</td>
            </tr>
            <tr>
              <td>11</td>
              <td>Saldo Piutang Usaha</td>
              <td>0</td>
              <td>0</td>
            </tr>
            <tr>
              <td>12</td>
              <td>Laba Berjalan</td>
              <td>0</td>
              <td>0</td>
            </tr>
                  </tbody>
              </table>

              </div>
            </div>
            
        </div>


        <div class="col">
          <div class="card">
            <div class="card-header">PERENCANAAN KEUANGAN</div>
            <div class="card-body">
              <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>DATA</th>
                        <th>BULAN</th>
                        <th>TAHUN</th>
                    </tr>
                </thead>
                <tbody id="summary-table-body">
                    <tr>
                        <td>1</td>
                        <td>Realisasi Penerimaan</td>
                        <td>0</td>
                        <td>0</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Penerimaan</td>
                        <td>0</td>
                        <td>0</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Target Anggaran</td>
                        <td>0</td>
                        <td>0</td>
                    </tr>
                    <tr>
                      <td>4 </td>
                      <td>Realisasi Pendapatan</td>
                      <td>0</td>
                      <td>0</td>
                  </tr>
                 
                <tr>
                  <td>5</td>
                  <td>Pendapatan</td>
                  <td>0</td>
                  <td>0</td>
                </tr>
                <tr>
                  <td>6</td>
                  <td>Target Anggaran</td>
                  <td>0</td>
                  <td>0</td>
                </tr>
                <tr>
                  <td>7</td>
                  <td>Realisasi Investasi</td>
                  <td>0</td>
                  <td>0</td>
                </tr>
                <tr>
                  <td>8</td>
                  <td>Investasi</td>
                  <td>0</td>
                  <td>0</td>
                </tr>
                <tr>
                  <td>9</td>
                  <td>Pagu Invenstasi</td>
                  <td>0</td>
                  <td>0</td>
                </tr>
                
                <tr>
                  <td>10</td>
                  <td>Realisasi Biaya</td>
                  <td>0</td>
                  <td>0</td>
                </tr>
                <tr>
                  <td>11</td>
                  <td>Biaya</td>
                  <td>0</td>
                  <td>0</td>
                </tr>
                <tr>
                  <td>12</td>
                  <td>Pagu Biaya</td>
                  <td>0</td>
                  <td>0</td>
                </tr>
                </tbody>
            </table>

            </div>
          </div>
          
      </div>

      <div class="col">
        <div class="card">
          <div class="card-header">KAS</div>
          <div class="card-body">
            <table class="table table-bordered">
              <thead>
                  <tr>
                      <th>NO</th>
                      <th>KEGIATAN</th>
                      <th>BULAN</th>
                      <th>TAHUN</th>
                  </tr>
              </thead>
              <tbody id="summary-table-body">
                  <tr>
                      <td>1</td>
                      <td>Saldo Kas Dan Bank</td>
                      <td>0</td>
                      <td>0</td>
                  </tr>
                  <tr>
                    <td>2</td>
                    <td>Penerimaan Harian</td>
                    <td>0</td>
                    <td>0</td>
                  </tr>
                  <tr>
                    <td>3</td>
                    <td>Pengeluaran Harian</td>
                    <td>0</td>
                    <td>0</td>
                 </tr>
                  
              </tbody>
          </table>

          </div>
        </div>

        <div class="card">
          <div class="card-header">ASET</div>
          <div class="card-body">
            <table class="table table-bordered">
              <thead>
                  <tr>
                      <th>NO</th>
                      <th>DATA</th>
                      <th>BULAN</th>
                      <th>TAHUN</th>
                  </tr>
              </thead>
              <tbody id="summary-table-body">
                  <tr>
                      <td>1</td>
                      <td>Total Aset</td>
                      <td>0</td>
                      <td>0</td>
                  </tr>
                  <tr>
                    <td>2</td>
                    <td>Realisasi Aset Tetap</td>
                    <td>0</td>
                    <td>0</td>
                  </tr>
                  <tr>
                    <td>3</td>
                    <td>Realisasi Aset Tetap</td>
                    <td>0</td>
                    <td>0</td>
                  </tr>
                  <tr>
                    <td>4</td>
                    <td>Aset Serah Kelola</td>
                    <td>0</td>
                    <td>0</td>
                  </tr>
                  <tr>
                    <td>5</td>
                    <td>Aset Serah Terima</td>
                    <td>0</td>
                    <td>0</td>
                  </tr>
                  
              </tbody>
          </table>

          </div>
        </div>
        
        
    </div>
 </div>
  </fieldset><br>
{{-- DATA BULANAN --}}

<fieldset class="border border-primary rounded">
    <legend class="ml-2 w-auto px-3 border border-primary rounded"><h6>Data Bulanan Akuntansi</h6></legend>
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
                      <th>Saldo Piutang Usaha</th>
                      <th>Laba Berjalan</th>
                      <th>Periode</th>
                      <th>-</th>
                  </tr>
              </thead>
              <tbody id="summary-table-body">
                
                  
               
                <tr>
                    <td></td>
                    
                    <td><div class="btn-group">
                      <button type="button" class="btn btn-default btn-sm">Action</button>
                      <button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown" aria-expanded="false">
                        <span class="sr-only">Toggle Dropdown</span>
                      </button>
                      <div class="dropdown-menu" role="menu" style="">
                        <a class="dropdown-item" href="#">Edit</a>
                        <a class="dropdown-item" href="#">Hapus</a>
                      </div>
                      </div>
                    </td>
                    
                </tr>
                
              </tbody>
          </table>

          </div>
        </div>
        
    </div>
</div>

</fieldset><br>
<fieldset class="border border-primary rounded">
  <legend class="ml-2 w-auto px-3 border border-primary rounded"><h6>Data Bulanan Perencanaan Keungan</h6></legend>
<div class="row">
  
  <div class="col">
      <div class="card">
        <div class="card-header"></div>
        <div class="card-body">
          <table class="table table-bordered">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>Realisasi Penerimaan</th>
                    <th>Penerimaan</th>
                    <th>Target Anggaran</th>
                    <th>Realisasi Pendapatan</th>
                    <th>Pendapatan</th>
                    <th>Target Anggaran</th>
                    <th>Realisasi Investasi</th>
                    <th>Investasi</th>
                    <th>Pagu Invenstasi</th>
                    <th>Realisasi Biaya</th>
                    <th>Biaya</th>
                    <th>Pagu Biaya</th>
                </tr>
            </thead>
            <tbody id="summary-table-body">
              <tr>
                  <td>1</td>
                  <td>0</td>
                  <td>0</td>
                  <td>0</td>
                  <td>1</td>
                  <td>0</td>
                  <td>0</td>
                  <td>0</td>
                  <td>1</td>
                  <td>0</td>
                  <td>0</td>
                  <td>0</td>
                  
                  
              </tr>
            </tbody>
        </table>

        </div>
      </div>
      
  </div>
</div>

</fieldset><br>

      <div class="row">
        <div class="col">

          <fieldset class="border border-primary rounded">
            <legend class="ml-2 w-auto px-3 border border-primary rounded"><h6>Data Bulanan Kas</h6></legend>
          <div class="row">
            
            <div class="col">
                <div class="card">
                  <div class="card-header"></div>
                  <div class="card-body">
                    <table class="table table-bordered">
                      <thead>
                          <tr>
                              <th>NO</th>
                              <th>Saldo Kas Dan Bank</th>
                              <th>Penerimaan Harian</th>
                              <th>Pengeluaran Harian</th>
                              
                          </tr>
                      </thead>
                      <tbody id="summary-table-body">
                        <tr>
                            <td>1</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                        </tr>
                      </tbody>
                  </table>
          
                  </div>
                </div>
                
            </div>
          </div>
        </fieldset>
      </div>

      <div class="col">

        <fieldset class="border border-primary rounded">
          <legend class="ml-2 w-auto px-3 border border-primary rounded"><h6>Data Bulanan Aset</h6></legend>
        <div class="row">
          
          <div class="col">
              <div class="card">
                <div class="card-header"></div>
                <div class="card-body">
                  <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>Total Aset</th>
                            <th>Realisasi Aset Tetap</th>
                            <th>Aset Serah Kelola</th>
                            <th>Aset Serah Terima</th>
                            
                        </tr>
                    </thead>
                    <tbody id="summary-table-body">
                      <tr>
                          <td>1</td>
                          <td>0</td>
                          <td>0</td>
                          <td>0</td>
                      </tr>
                    </tbody>
                </table>
        
                </div>
              </div>
              
          </div>
        </div>
      </fieldset>
    </div>
    </div>


      
    </div>
</div>
</div>

      {{-- <div class="modal fade" id="modal-keu">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"  id="judul_umkes">KEUANGAN</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">


              <form action="/pp" method="POST" id="form-umkes">
                @csrf
                <input required type="hidden" id="" name="" class="form-control">
                <div class="row">
                  <div class="col"> 
                    <fieldset class="border border-primary rounded">
                      <legend class="ml-2 w-auto px-3 border border-primary rounded"><h6>Akuntansi</h6></legend>
                      <div class="container">
                        <label>Laba Setelah Pajak</label>
                        <input required type="number" class="form-control" name="labaStPjk" id="labaStPjk">
                        <label>Jumlah Ekuitas</label>
                        <input required type="number" class="form-control" name="JmllEkuitas" id="JmllEkuitas">
                        <label>Biaya Operasi</label>
                        <input required type="number" class="form-control" name="biayaOpr" id="biayaOpr">
                        <label>Pendapatan Operasi</label>
                        <input required type="number" class="form-control" name="jumlahPeg" id="jumlahPeg">
                        <label>Kas + Setara Kas</label>
                        <input required type="number" class="form-control" name="kasSetKas" id="kasSetKas">
                        <label>Hutang Lancar</label>
                        <input required type="number" class="form-control" name="HtgLancar" id="HtgLancar">
                        <label>Solvabilitas</label>
                        <input required type="number" class="form-control" name="solvabilitas" id="solvabilitas">
                        <label>Total Aktiva</label>
                        <input required type="number" class="form-control" name="ttlAktiva" id="ttlAktiva">
                        <label>Total Hutang</label>
                        <input required type="number" class="form-control" name="ttlHutang" id="ttlHutang">
                        <label>Saldo Piutang Usaha</label>
                        <input required type="number" class="form-control" name="SaldoPiutang" id="SaldoPiutang">
                        <label>Laba Berjalan</label>
                        <input required type="number" class="form-control" name="labaBerjalan" id="labaBerjalan"> 
                      </div><br>

                    </fieldset>
                  </div>

                  <div class="col"> 
                    <fieldset class="border border-primary rounded">
                      <legend class="ml-2 w-auto px-3 border border-primary rounded"><h6>Perencanaan Keuangan</h6></legend>
                      <div class="container">
                        <label>Realisasi Penerimaan</label>
                        <input required type="number" class="form-control" name="realTerima" id="realTerima">
                        <label>Penerimaan</label>
                        <input required type="number" class="form-control" name="penerimaan" id="penerimaan">
                        <label>Target Anggaran</label>
                        <input required type="number" class="form-control" name="trgtAnggaran" id="trgtAnggaran">
                        <label>Realisasi Pendapatan</label>
                        <input required type="number" class="form-control" name="realDapat" id="realDapat">
                        <label>Pendapatan</label>
                        <input required type="number" class="form-control" name="pendapatan" id="pendapatan">
                        <label>Target Anggaran</label>
                        <input required type="number" class="form-control" name="trgtAnggaran" id="trgtAnggaran">
                        <label>Realisasi Investasi</label>
                        <input required type="number" class="form-control" name="reaLinvets" id="reaLinvets">
                        <label>Investasi</label>
                        <input required type="number" class="form-control" name="investasi" id="investasi">
                        <label>Pagu Invenstasi</label>
                        <input required type="number" class="form-control" name="paguInvst" id="paguInvst">
                        <label>Realisasi Biaya</label>
                        <input required type="number" class="form-control" name="realBiaya" id="realBiaya">
                        <label>Biaya</label>
                        <input required type="number" class="form-control" name="paguBiaya" id="paguBiaya">
                        <label>Pagu Biaya</label>
                        <input required type="number" class="form-control" name="jumlahPeg" id="jumlahPeg"> 
                      </div><br>
                    </fieldset>
                  </div>
                </div><br>  

                <div class="row">
                  <div class="col">
                    <fieldset class="border border-primary rounded">
                      <legend class="ml-2 w-auto px-3 border border-primary rounded"><h6>Kas</h6></legend>
                      <div class="container">
                        <label>Saldo Kas Dan Bank</label>
                        <input required type="number" class="form-control" name="saldoKasBank" id="saldoKasBank">
                        <label>Penerimaan Harian</label>
                        <input required type="number" class="form-control" name="terimaHarian" id="terimaHarian">
                        <label>Pengeluaran Harian</label>
                        <input required type="number" class="form-control" name="keluarHarian" id="keluarHarian">
                      </div><br>
                    </fieldset>
                  </div>

                  <div class="col">
                    <fieldset class="border border-primary rounded">
                      <legend class="ml-2 w-auto px-3 border border-primary rounded"><h6>Aset</h6></legend>
                      <div class="container">
                        <label>Total Aset</label>
                        <input required type="number" class="form-control" name="totalAset" id="totalAset">
                        <label>Realisasi Aset Tetap</label>
                        <input required type="number" class="form-control" name="realAsetTtp" id="realAsetTtp">
                        <label>Aset Serah Kelola</label>
                        <input required type="number" class="form-control" name="serahKelola" id="serahKelola">
                        <label>Aset Serah Terima</label>
                        <input required type="number" class="form-control" name="serahTerima" id="serahTerima">
                      </div><br>
                    </fieldset>
                  </div>

                  <div class="col">
                    <fieldset class="border border-primary rounded">
                      <legend class="ml-2 w-auto px-3 border border-primary rounded"><h6>Periode</h6></legend>
                      <div class="container">
                        <label>Periode</label>
                        <select name="periode" class="form-control" id="periode">
                          @foreach ($bulan as $month)
                            <option value="{{ $month }}">{{ $month }}</option>
                          @endforeach
                        </select>
                      </div><br>
                    </fieldset>
                  </div>
                </div>
              </div>

            <div class="modal-footer justify-content-between">
              <div class="float-right"><button type="submit" class="btn btn-primary">SIMPAN</button></div>
            </div>
          </form>


          </div>
         
        </div>
      </div> --}}

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
