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
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-keu" id="tambah_keu">Tambah Data Keuangan</button>
    </div>
  <br><br>

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
        
    </div>

    <div class="col">
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
                      <th>Ratio Operasional</th>
                      <th>Biaya Operasi</th>
                      <th>Pendapatan Operasi</th>
                      <th>Kas + Setara Kas</th>
                      <th>Hutang Lancar</th>
                      <th>Solvabilitas</th>
                      <th>Total Aktiva</th>
                      <th>Total Hutang</th>
                      <th>Saldo Piutang Usaha</th>
                      <th>Laba Berjalan</th>
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

      <div class="modal fade" id="modal-keu">
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
                        {{-- <label>Ratio Operasional</label>
                        <input required type="number" class="form-control" name="" id=""> --}}
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
                        <label>Realisasi Penerimaan</label>
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
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
 
@endsection
