@extends('layouts.main')

@section('title')
  EVKIN | DASHBAORAD
@endsection

@section('content')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <h1 class="m-0 text-center">KEPATUHAN</h1>
  </div>
  <!-- /.content-header -->
  <div class="content">
    <div class="float-right">
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-patuh" id="tambah_patuh">Tambah Data</button>
    </div>
  <br><br>

  <fieldset class="border border-primary rounded">
    <legend class="ml-2 w-auto px-3 border border-primary rounded"><h6>DATA KESELURUHAN</h6></legend>
          <div class="content row">
           
            
          <div class="col">
            <div class="card">
              <div class="card-header">KEPATUAHAN</div>
              <div class="card-body">
                <table>
                    <thead>
                        <tr>
                            <th rowspan="2">KEPATUHAN WILAYAH</th>
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
                            <td>SL Diputus</td>
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
                            <td>Buka Kembali</td>
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
                            <td>Realisasi Tertagih</td>
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
                            <td>Target Penyelesaian Piutang</td>
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
    <legend class="ml-2 w-auto px-3 border border-primary rounded"><h6>Data Bulanan Kepatuhan</h6></legend>
 <div class="row">
    
    <div class="col">
        <div class="card">
          <div class="card-header">Kepatuhan Wilayah I</div>
          <div class="card-body">
            <table class="table table-bordered">
              <thead>
                  <tr>
                      <th>NO</th>
                      <th>SL Diputus</th>
                      <th>Buka Kembali</th>
                      <th>Realisasi Tertagih</th>
                      <th>Target Penyelesaian Piutang</th>
                      <th>Periode</th>
                  </tr>
              </thead>
              <tbody id="summary-table-body">
                <tr>
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
    <div class="col">
        <div class="card">
          <div class="card-header">Kepatuhan Wilayah II</div>
          <div class="card-body">
            <table class="table table-bordered">
              <thead>
                  <tr>
                      <th>NO</th>
                      <th>SL Diputus</th>
                      <th>Buka Kembali</th>
                      <th>Realisasi Tertagih</th>
                      <th>Target Penyelesaian Piutang</th>
                      <th>Periode</th>
                  </tr>
              </thead>
              <tbody id="summary-table-body">
                <tr>
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
<div class="row">
    
    <div class="col">
        <div class="card">
          <div class="card-header">Kepatuhan Wilayah III</div>
          <div class="card-body">
            <table class="table table-bordered">
              <thead>
                  <tr>
                      <th>NO</th>
                      <th>SL Diputus</th>
                      <th>Buka Kembali</th>
                      <th>Realisasi Tertagih</th>
                      <th>Target Penyelesaian Piutang</th>
                      <th>Periode</th>
                  </tr>
              </thead>
              <tbody id="summary-table-body">
                <tr>
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
    <div class="col">
        <div class="card">
          <div class="card-header">Kepatuhan Wilayah IV</div>
          <div class="card-body">
            <table class="table table-bordered">
              <thead>
                  <tr>
                      <th>NO</th>
                      <th>SL Diputus</th>
                      <th>Buka Kembali</th>
                      <th>Realisasi Tertagih</th>
                      <th>Target Penyelesaian Piutang</th>
                      <th>Periode</th>
                  </tr>
              </thead>
              <tbody id="summary-table-body">
                <tr>
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

      <div class="modal fade" id="modal-patuh">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"  id="judul_umkes">KEPATUHAN</h4>
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
                        <label>SL Diputus</label>
                        <input required type="number" class="form-control" name="sLputus" id="sLputus">
                        <label>Buka Kembali</label>
                        <input required type="number" class="form-control" name="buka" id="buka">
                        <label>Realisasi Tertagih</label>
                        <input required type="number" class="form-control" name="realisasiTagih" id="realisasiTagih">
                        <label>Target Penyelesaian Piutang</label>
                        <input required type="number" class="form-control" name="target" id="target">
                      </div><br>

                    </fieldset>
                  </div>

                  <div class="col"> 
                    <fieldset class="border border-primary rounded">
                      <legend class="ml-2 w-auto px-3 border border-primary rounded"><h6>Wilayah II</h6></legend>
                      <div class="container">
                        <label>SL Diputus</label>
                        <input required type="number" class="form-control" name="sLputus2" id="sLputus2">
                        <label>Buka Kembali</label>
                        <input required type="number" class="form-control" name="buka2" id="buka2">
                        <label>Realisasi Tertagih</label>
                        <input required type="number" class="form-control" name="realisasiTagih2" id="realisasiTagih2">
                        <label>Target Penyelesaian Piutang</label>
                        <input required type="number" class="form-control" name="target2" id="target2">
                      </div><br>
                    </fieldset>
                  </div>
                </div><br>  

                <div class="row">
                  <div class="col">
                    <fieldset class="border border-primary rounded">
                      <legend class="ml-2 w-auto px-3 border border-primary rounded"><h6>Wilayah III</h6></legend>
                      <div class="container">
                        <label>SL Diputus</label>
                        <input required type="number" class="form-control" name="sLputus3" id="sLputus3">
                        <label>Buka Kembali</label>
                        <input required type="number" class="form-control" name="buka3" id="buka3">
                        <label>Realisasi Tertagih</label>
                        <input required type="number" class="form-control" name="realisasiTagih3" id="realisasiTagih3">
                        <label>Target Penyelesaian Piutang</label>
                        <input required type="number" class="form-control" name="target3" id="target3">
                      </div><br>
                    </fieldset>
                  </div>

                  <div class="col">
                    <fieldset class="border border-primary rounded">
                      <legend class="ml-2 w-auto px-3 border border-primary rounded"><h6>Wilayah IV</h6></legend>
                      <div class="container">
                        <label>SL Diputus</label>
                        <input required type="number" class="form-control" name="sLputus4" id="sLputus4">
                        <label>Buka Kembali</label>
                        <input required type="number" class="form-control" name="buka4" id="buka4">
                        <label>Realisasi Tertagih</label>
                        <input required type="number" class="form-control" name="realisasiTagih4" id="realisasiTagih4">
                        <label>Target Penyelesaian Piutang</label>
                        <input required type="number" class="form-control" name="target4" id="target4">

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
