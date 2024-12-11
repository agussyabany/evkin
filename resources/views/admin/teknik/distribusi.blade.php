@extends('layouts.main')

@section('title')
  EVKIN | DASHBAORAD
@endsection

@section('content')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <h1 class="m-0 text-center">DISTRIBUSI</h1>
  </div>
  <!-- /.content-header -->
  <div class="content">
    <div class="float-right">
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-dist" id="tambah_dist">Tambah Data</button>
    </div>
  <br><br>

  <fieldset class="border border-primary rounded">
    <legend class="ml-2 w-auto px-3 border border-primary rounded"><h6>DATA KESELURUHAN</h6></legend>
          <div class="content row">
           
            
          <div class="col">
            <div class="card">
              <div class="card-header">AKUNTANSI</div>
              <div class="card-body">
                <table>
                    <thead>
                        <tr>
                            <th rowspan="2">DISTRIBUSI WILAYAH</th>
                            <th colspan="2">I</th>
                            <th colspan="2">II</th>
                            <th colspan="2">III</th>
                            <th colspan="2">IV</th>
                        </tr>
                        <tr>
                            <th>TAHUN</th>
                            <th>BULAN</th>
                            <th>TAHUN</th>
                            <th>BULAN</th>
                            <th>TAHUN</th>
                            <th>BULAN</th>
                            <th>TAHUN</th>
                            <th>BULAN</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Jumlah Waktu Pelayanan/Distribusi (jam) dalam 1 Tahun</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>Tekanan Air pada SR</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>Jumlah Pelanggan yang Dilayani dengan Tekanan > 0,7 Bar</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>Kehilangan Air</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>Air Didistribusikan</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>Air Terjual (DRD)</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>Aduan Kebocoran</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>Penyelesaian Aduan Kebocoran</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
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
    <legend class="ml-2 w-auto px-3 border border-primary rounded"><h6>Data Bulanan Distirbusi Wilayah I</h6></legend>
 <div class="row">
    
    <div class="col">
        <div class="card">
          <div class="card-header"></div>
          <div class="card-body">
            <table class="table table-bordered">
              <thead>
                  <tr>
                      <th>NO</th>
                      <th>Jumlah Waktu Pelayanan/Distribusi</th>
                      <th>Tekanan Air pada SR</th>
                      <th>Jumlah Pelanggan yang Dilayani dengan Tekanan > 0,7 Bar</th>
                      <th>Kehilangan Air</th>
                      <th>Air Didistribusikan</th>
                      <th>Air Terjual (DRD)</th>
                      <th>Aduan Kebocoran</th>
                      <th>Penyelesaian Aduan Kebocoran</th>
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
                </tr>
              </tbody>
          </table>

          </div>
        </div>
        
    </div>
</div>

</fieldset><br>

<fieldset class="border border-primary rounded">
    <legend class="ml-2 w-auto px-3 border border-primary rounded"><h6>Data Bulanan Distirbusi Wilayah II</h6></legend>
 <div class="row">
    
    <div class="col">
        <div class="card">
          <div class="card-header"></div>
          <div class="card-body">
            <table class="table table-bordered">
              <thead>
                  <tr>
                      <th>NO</th>
                      <th>Jumlah Waktu Pelayanan/Distribusi</th>
                      <th>Tekanan Air pada SR</th>
                      <th>Jumlah Pelanggan yang Dilayani dengan Tekanan > 0,7 Bar</th>
                      <th>Kehilangan Air</th>
                      <th>Air Didistribusikan</th>
                      <th>Air Terjual (DRD)</th>
                      <th>Aduan Kebocoran</th>
                      <th>Penyelesaian Aduan Kebocoran</th>
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
                </tr>
              </tbody>
          </table>

          </div>
        </div>
        
    </div>
</div>

</fieldset><br>


<fieldset class="border border-primary rounded">
    <legend class="ml-2 w-auto px-3 border border-primary rounded"><h6>Data Bulanan Distirbusi Wilayah III</h6></legend>
 <div class="row">
    
    <div class="col">
        <div class="card">
          <div class="card-header"></div>
          <div class="card-body">
            <table class="table table-bordered">
              <thead>
                  <tr>
                      <th>NO</th>
                      <th>Jumlah Waktu Pelayanan/Distribusi</th>
                      <th>Tekanan Air pada SR</th>
                      <th>Jumlah Pelanggan yang Dilayani dengan Tekanan > 0,7 Bar</th>
                      <th>Kehilangan Air</th>
                      <th>Air Didistribusikan</th>
                      <th>Air Terjual (DRD)</th>
                      <th>Aduan Kebocoran</th>
                      <th>Penyelesaian Aduan Kebocoran</th>
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
                </tr>
              </tbody>
          </table>

          </div>
        </div>
        
    </div>
</div>

</fieldset><br>

<fieldset class="border border-primary rounded">
    <legend class="ml-2 w-auto px-3 border border-primary rounded"><h6>Data Bulanan Distirbusi Wilayah IV</h6></legend>
 <div class="row">
    
    <div class="col">
        <div class="card">
          <div class="card-header"></div>
          <div class="card-body">
            <table class="table table-bordered">
              <thead>
                  <tr>
                      <th>NO</th>
                      <th>Jumlah Waktu Pelayanan/Distribusi</th>
                      <th>Tekanan Air pada SR</th>
                      <th>Jumlah Pelanggan yang Dilayani dengan Tekanan > 0,7 Bar</th>
                      <th>Kehilangan Air</th>
                      <th>Air Didistribusikan</th>
                      <th>Air Terjual (DRD)</th>
                      <th>Aduan Kebocoran</th>
                      <th>Penyelesaian Aduan Kebocoran</th>
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
                </tr>
              </tbody>
          </table>

          </div>
        </div>
        
    </div>
</div>

</fieldset><br>
</div>
</div>

      <div class="modal fade" id="modal-dist">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"  id="judul_umkes">DISTRIBUSI</h4>
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
                      <legend class="ml-2 w-auto px-3 border border-primary rounded"><h6>Wilayah 1</h6></legend>
                      <div class="container">
                        <label>Jumlah Waktu Pelayanan/Distribusi</label>
                        <input required type="number" class="form-control" name="jmlWktPelDist" id="jmlWktPelDist">
                        <label>Tekanan Air pada SR</label>
                        <input required type="number" class="form-control" name="TekananAir" id="TekananAir">
                        {{-- <label>Ratio Operasional</label>
                        <input required type="number" class="form-control" name="" id=""> --}}
                        <label>Jumlah Pelanggan yang Dilayani dengan Tekanan > 0,7 Bar</label>
                        <input required type="number" class="form-control" name="plg07bar" id="plg07bar">
                        <label>Kehilangan Air</label>
                        <input required type="number" class="form-control" name="nrw" id="nrw">
                        <label>Air Didistribusikan</label>
                        <input required type="number" class="form-control" name="AirDist" id="AirDist">
                        <label>Air Terjual (DRD)</label>
                        <input required type="number" class="form-control" name="airDRD" id="airDRD">
                        <label>Aduan Kebocoran</label>
                        <input required type="number" class="form-control" name="aduanBocor" id="aduanBocor">
                        <label>Penyelesaian Aduan Kebocoran</label>
                        <input required type="number" class="form-control" name="aduabBocorSel" id="aduabBocorSel">
                      </div><br>

                    </fieldset>
                  </div>

                  <div class="col"> 
                    <fieldset class="border border-primary rounded">
                      <legend class="ml-2 w-auto px-3 border border-primary rounded"><h6>WEILAYAH II</h6></legend>
                      <div class="container">
                        <label>Jumlah Waktu Pelayanan/Distribusi</label>
                        <input required type="number" class="form-control" name="jmlWktPelDist2" id="jmlWktPelDist2">
                        <label>Tekanan Air pada SR</label>
                        <input required type="number" class="form-control" name="TekananAir2" id="TekananAir2">
                        {{-- <label>Ratio Operasional</label>
                        <input required type="number" class="form-control" name="" id=""> --}}
                        <label>Jumlah Pelanggan yang Dilayani dengan Tekanan > 0,7 Bar</label>
                        <input required type="number" class="form-control" name="plg07bar2" id="plg07bar2">
                        <label>Kehilangan Air</label>
                        <input required type="number" class="form-control" name="nrw2" id="nrw2">
                        <label>Air Didistribusikan</label>
                        <input required type="number" class="form-control" name="AirDist2" id="AirDist2">
                        <label>Air Terjual (DRD)</label>
                        <input required type="number" class="form-control" name="airDRD2" id="airDRD2">
                        <label>Aduan Kebocoran</label>
                        <input required type="number" class="form-control" name="aduanBocor2" id="aduanBocor2">
                        <label>Penyelesaian Aduan Kebocoran</label>
                        <input required type="number" class="form-control" name="aduabBocorSel2" id="aduabBocorSel2"> 
                      </div><br>
                    </fieldset>
                  </div>
                </div><br>  

                <div class="row">
                  <div class="col">
                    <fieldset class="border border-primary rounded">
                      <legend class="ml-2 w-auto px-3 border border-primary rounded"><h6>Wilayah III</h6></legend>
                      <div class="container">
                        <label>Jumlah Waktu Pelayanan/Distribusi</label>
                        <input required type="number" class="form-control" name="jmlWktPelDist3" id="jmlWktPelDist3">
                        <label>Tekanan Air pada SR</label>
                        <input required type="number" class="form-control" name="TekananAir3" id="TekananAir3">
                        {{-- <label>Ratio Operasional</label>
                        <input required type="number" class="form-control" name="" id=""> --}}
                        <label>Jumlah Pelanggan yang Dilayani dengan Tekanan > 0,7 Bar</label>
                        <input required type="number" class="form-control" name="plg07bar3" id="plg07bar3">
                        <label>Kehilangan Air</label>
                        <input required type="number" class="form-control" name="nrw3" id="nrw3">
                        <label>Air Didistribusikan</label>
                        <input required type="number" class="form-control" name="AirDist3" id="AirDist3">
                        <label>Air Terjual (DRD)</label>
                        <input required type="number" class="form-control" name="airDRD3" id="airDRD3">
                        <label>Aduan Kebocoran</label>
                        <input required type="number" class="form-control" name="aduanBocor3" id="aduanBocor3">
                        <label>Penyelesaian Aduan Kebocoran</label>
                        <input required type="number" class="form-control" name="aduabBocorSel3" id="aduabBocorSel3">
                      </div><br>
                    </fieldset>
                  </div>

                  <div class="col">
                    <fieldset class="border border-primary rounded">
                      <legend class="ml-2 w-auto px-3 border border-primary rounded"><h6>WILAYAH IV</h6></legend>
                      <div class="container">
                        <label>Jumlah Waktu Pelayanan/Distribusi</label>
                        <input required type="number" class="form-control" name="jmlWktPelDist4" id="jmlWktPelDist4">
                        <label>Tekanan Air pada SR</label>
                        <input required type="number" class="form-control" name="TekananAir4" id="TekananAir4">
                        {{-- <label>Ratio Operasional</label>
                        <input required type="number" class="form-control" name="" id=""> --}}
                        <label>Jumlah Pelanggan yang Dilayani dengan Tekanan > 0,7 Bar</label>
                        <input required type="number" class="form-control" name="plg07bar4" id="plg07bar4">
                        <label>Kehilangan Air</label>
                        <input required type="number" class="form-control" name="nrw4" id="nrw4">
                        <label>Air Didistribusikan</label>
                        <input required type="number" class="form-control" name="AirDist4" id="AirDist4">
                        <label>Air Terjual (DRD)</label>
                        <input required type="number" class="form-control" name="airDRD4" id="airDRD4">
                        <label>Aduan Kebocoran</label>
                        <input required type="number" class="form-control" name="aduanBocor4" id="aduanBocor4">
                        <label>Penyelesaian Aduan Kebocoran</label>
                        <input required type="number" class="form-control" name="aduabBocorSel4" id="aduabBocorSel4">
                      </div><br>
                    </fieldset>
                  </div>
                </div>

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
