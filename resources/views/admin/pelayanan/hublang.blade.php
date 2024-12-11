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
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-dist" id="tambah_dist">Tambah Data</button>
    </div>
  <br><br>

  <fieldset class="border border-primary rounded">
    <legend class="ml-2 w-auto px-3 border border-primary rounded"><h6>DATA KESELURUHAN</h6></legend>
          <div class="content row">
           
            
          <div class="col">
            <div class="card">
              <div class="card-header">UNIT PELAYANAN WILAYAH</div>
              <div class="card-body">
                <table>
                    <thead>
                        <tr>
                            <th rowspan="2">UNIT PELAYANAN WILAYAH</th>
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
                            <td>Pertumbuhan Jumlah Pelanggan</td>
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
                            <td>Jumlah Plgn Tahun Sebelumnya</td>
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
                            <td>Jumlah Permohonan SL</td>
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
                            <td>Realisasi</td>
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
                            <td>Permohonan tertunda</td>
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

      <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-header">REKENING</div>
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
                        <td>Efesiensi Tagihan</td>
                        <td>0</td>
                        <td>0</td>
                    </tr>
                    <tr>
                      <td>2</td>
                      <td>DRD</td>
                      <td>0</td>
                      <td>0</td>
                    </tr>
                    <tr>
                      <td>3</td>
                      <td>Jumlah air Domestik Terjual</td>
                      <td>0</td>
                      <td>0</td>
                    </tr>
                    <tr>
                      <td>4</td>
                      <td>Jumlah Plg Domestik D1 -D4</td>
                      <td>0</td>
                      <td>0</td>
                    </tr>
                    <tr>
                      <td>5</td>
                      <td>Jumlah Air Terjual</td>
                      <td>0</td>
                      <td>0</td>
                    </tr>
                    <tr>
                      <td>6</td>
                      <td>Efektifitas Penagihan</td>
                      <td>0</td>
                      <td>0</td>
                    </tr>
                    <tr>
                      <td>7</td>
                      <td>Jumlah Penerimaan Rekening Air</td>
                      <td>0</td>
                      <td>0</td>
                    </tr>
                    <tr>
                      <td>8</td>
                      <td>Jumlah Rekening Air</td>
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
            <div class="card-header">AKURASI METER</div>
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
                        <td>Kalibrasi</td>
                        <td>0</td>
                        <td>0</td>
                    </tr>
                    <tr>
                      <td>2</td>
                      <td>Penggantian Meter</td>
                      <td>0</td>
                      <td>0</td>
                    </tr>
                    
                </tbody>
            </table>
          </div>
          </div>

          <div class="card">
            <div class="card-header">GRAFIK INFORMASI SISTEM</div>
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
                        <td>Digitasi SL</td>
                        <td>0</td>
                        <td>0</td>
                    </tr>
                    <tr>
                      <td>2</td>
                      <td>Digitasi Perpipaan</td>
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
    <legend class="ml-2 w-auto px-3 border border-primary rounded"><h6>Data Bulanan  Wilayah I</h6></legend>
 <div class="row">
    
    <div class="col">
        <div class="card">
          <div class="card-header">UPW1</div>
          <div class="card-body">
            <table class="table table-bordered">
              <thead>
                  <tr>
                      <th>NO</th>
                      <th>Pertumbuhan Jumlah Pelangga</th>
                      <th>Jumlah Plgn Tahun Sebelumnya</th>
                      <th>Jumlah Permohonan SL</th>
                      <th>Realisasi</th>
                      <th>Permohonan tertunda</th>
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
                </tr>
              </tbody>
          </table>
        </div>
      </div>
    </div>

    <div class="col">
      <div class="card">
        <div class="card-header">UPW2</div>
        <div class="card-body">
          <table class="table table-bordered">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>Pertumbuhan Jumlah Pelangga</th>
                    <th>Jumlah Plgn Tahun Sebelumnya</th>
                    <th>Jumlah Permohonan SL</th>
                    <th>Realisasi</th>
                    <th>Permohonan tertunda</th>
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
        <div class="card-header">UPW3</div>
        <div class="card-body">
          <table class="table table-bordered">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>Pertumbuhan Jumlah Pelangga</th>
                    <th>Jumlah Plgn Tahun Sebelumnya</th>
                    <th>Jumlah Permohonan SL</th>
                    <th>Realisasi</th>
                    <th>Permohonan tertunda</th>
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
              </tr>
            </tbody>
        </table>
      </div>
    </div>
  </div>

  <div class="col">
    <div class="card">
      <div class="card-header">UPW4</div>
      <div class="card-body">
        <table class="table table-bordered">
          <thead>
              <tr>
                  <th>NO</th>
                  <th>Pertumbuhan Jumlah Pelangga</th>
                  <th>Jumlah Plgn Tahun Sebelumnya</th>
                  <th>Jumlah Permohonan SL</th>
                  <th>Realisasi</th>
                  <th>Permohonan tertunda</th>
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
        <div class="card-header">Rekening</div>
        <div class="card-body">
          <table class="table table-bordered">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>Efesiensi Tagihan</th>
                    <th>DRD</th>
                    <th>Jumlah air Domestik Terjual</th>
                    <th>Jumlah Plg Domestik D1 -D4</th>
                    <th>Jumlah Air Terjual</th>
                    <th>Efektifitas Penagihan</th>
                    <th>Jumlah Penerimaan Rekening Air</th>
                    <th>Jumlah Rekening Air</th>
                    
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
                  <td>1</td>
                  <td>0</td>
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
        <div class="card-header">AKURASI METER</div>
        <div class="card-body">
          <table class="table table-bordered">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>Kalibrasi</th>
                    <th>Penggantian Meter</th>
                    <th>Periode</th>
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

  <div class="col">
    <div class="card">
      <div class="card-header">GIS</div>
      <div class="card-body">
        <table class="table table-bordered">
          <thead>
              <tr>
                  <th>NO</th>
                  <th>Digitasi SL</th>
                  <th>Digitasi Perpipaan</th>
                  <th>Periode</th>
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
</div>

</fieldset><br>
</div>
</div>

      <div class="modal fade" id="modal-dist">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"  id="judul_umkes">HUBLANG</h4>
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
                        <label>Pertumbuhan Jumlah Pelanggan</label>
                        <input required type="number" class="form-control" name="tumbuhPlgn" id="tumbuhPlgn">
                        <label>Jumlah Plgn Tahun Sebelumnya</label>
                        <input required type="number" class="form-control" name="plgnTahunLl" id="plgnTahunLl">
                        <label>Jumlah Permohonan SL</label>
                        <input required type="number" class="form-control" name="PermohonanSL" id="PermohonanSL">
                        <label>Realisasi</label>
                        <input required type="number" class="form-control" name="realisasi" id="realisasi">
                        <label>Permohonan tertunda</label>
                        <input required type="number" class="form-control" name="permohonanTunda" id="permohonanTunda">
                        
                      </div><br>

                    </fieldset>
                  </div>

                  <div class="col"> 
                    <fieldset class="border border-primary rounded">
                      <legend class="ml-2 w-auto px-3 border border-primary rounded"><h6>WEILAYAH II</h6></legend>
                      <div class="container">
                        <label>Pertumbuhan Jumlah Pelanggan</label>
                        <input required type="number" class="form-control" name="tumbuhPlgn2" id="tumbuhPlgn2">
                        <label>Jumlah Plgn Tahun Sebelumnya</label>
                        <input required type="number" class="form-control" name="plgnTahunLl2" id="plgnTahunLl2">
                        <label>Jumlah Permohonan SL</label>
                        <input required type="number" class="form-control" name="PermohonanSL2" id="PermohonanSL2">
                        <label>Realisasi</label>
                        <input required type="number" class="form-control" name="realisasi2" id="realisasi2">
                        <label>Permohonan tertunda</label>
                        <input required type="number" class="form-control" name="permohonanTunda2" id="permohonanTunda2">
                        
                      </div><br>
                    </fieldset>
                  </div>
                </div><br>  

                <div class="row">
                  <div class="col">
                    <fieldset class="border border-primary rounded">
                      <legend class="ml-2 w-auto px-3 border border-primary rounded"><h6>Wilayah III</h6></legend>
                      <div class="container">
                        <label>Pertumbuhan Jumlah Pelanggan</label>
                        <input required type="number" class="form-control" name="tumbuhPlgn3" id="tumbuhPlgn3">
                        <label>Jumlah Plgn Tahun Sebelumnya</label>
                        <input required type="number" class="form-control" name="plgnTahunLl3" id="plgnTahunLl3">
                        <label>Jumlah Permohonan SL</label>
                        <input required type="number" class="form-control" name="PermohonanSL3" id="PermohonanSL3">
                        <label>Realisasi</label>
                        <input required type="number" class="form-control" name="realisasi3" id="realisasi3">
                        <label>Permohonan tertunda</label>
                        <input required type="number" class="form-control" name="permohonanTunda3" id="permohonanTunda3">
                      </div><br>
                    </fieldset>
                  </div>

                  <div class="col">
                    <fieldset class="border border-primary rounded">
                      <legend class="ml-2 w-auto px-3 border border-primary rounded"><h6>WILAYAH IV</h6></legend>
                      <div class="container">
                        <label>Pertumbuhan Jumlah Pelanggan</label>
                        <input required type="number" class="form-control" name="tumbuhPlgn4" id="tumbuhPlgn4">
                        <label>Jumlah Plgn Tahun Sebelumnya</label>
                        <input required type="number" class="form-control" name="plgnTahunLl4" id="plgnTahunLl4">
                        <label>Jumlah Permohonan SL</label>
                        <input required type="number" class="form-control" name="PermohonanSL4" id="PermohonanSL4">
                        <label>Realisasi</label>
                        <input required type="number" class="form-control" name="realisasi4" id="realisasi4">
                        <label>Permohonan tertunda</label>
                        <input required type="number" class="form-control" name="permohonanTunda4" id="permohonanTunda4">
                        
                      </div><br>
                    </fieldset>
                  </div>
                </div><br>
                <fieldset class="border border-primary rounded">
                  <legend class="ml-2 w-auto px-3 border border-primary rounded"><h6>Rekening</h6></legend>
                  <div class="container">
                    <div class="row">
                      <div class="col">
                        <label>Efesiensi Tagihan</label>
                        <input required type="number" class="form-control" name="efesTag" id="efesTag">
                        <label>DRD</label>
                        <input required type="number" class="form-control" name="drd" id="drd">
                        
                        <label>Jumlah air Domestik Terjual</label>
                        <input required type="number" class="form-control" name="JmlAirDom" id="JmlAirDom">
                        <label>Jumlah Plg Domestik D1 -D4</label>
                        <input required type="number" class="form-control" name="PlgnDom" id="PlgnDom">
                      </div>
                      <div class="col">
                        <label>Jumlah Air Terjual</label>
                        <input required type="number" class="form-control" name="jmlAirTerjual" id="jmlAirTerjual">
                        <label>Efektifitas Penagihan</label>
                        <input required type="number" class="form-control" name="efekTagih" id="efekTagih">
                        
                        <label>Jumlah Penerimaan Rekening Air</label>
                        <input required type="number" class="form-control" name="terimaAir" id="terimaAir">
                        <label>Jumlah Rekening Air</label>
                        <input required type="number" class="form-control" name="jumRekAir" id="jumRekAir">
                      </div>
                    </div>
                  </div><br>
                </fieldset><br>

                <div class="row">
                  <div class="col">
                    <fieldset class="border border-primary rounded">
                      <legend class="ml-2 w-auto px-3 border border-primary rounded"><h6>Akurasi Meter</h6></legend>
                      <div class="container">
                        <label>Kalibrasi</label>
                        <input required type="number" class="form-control" name="kalibrasi" id="kalibrasi">
                        <label>Penggantian Meter</label>
                        <input required type="number" class="form-control" name="gantiMtr" id="gantiMtr">
                        
                      </div><br>
                    </fieldset>
                  </div>

                  <div class="col">
                    <fieldset class="border border-primary rounded">
                      <legend class="ml-2 w-auto px-3 border border-primary rounded"><h6>GIS</h6></legend>
                      <div class="container">
                        <label>Digitasi SL</label>
                        <input required type="number" class="form-control" name="digitasiSl" id="digitasiSl">
                        <label>Digitasi Perpipaan</label>
                        <input required type="number" class="form-control" name="digiatsiPipa" id="digiatsiPipa">
                        
                      </div><br>
                    </fieldset>
                  </div>
                </div><br>

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
