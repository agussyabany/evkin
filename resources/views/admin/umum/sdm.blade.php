@extends('layouts.main')

@section('title')
  EVKIN | DASHBAORAD
@endsection

@section('content')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <h1 class="m-0 text-center">SUMBER DAYA MANUSIA</h1>
  </div>
  <!-- /.content-header -->
  <div class="content">
    <div class="float-right">
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-sdm" id="tambah_sdm">Tambah Data</button>
    </div>
  <br><br>
  
  <fieldset class="border border-primary rounded">
    <legend class="ml-2 w-auto px-3 border border-primary rounded"><h6>DATA KESELURUHAN</h6></legend>
          <div class="content row">
           
            <div class="col">
              <div class="card">
                <div class="card-header">PENDIDIKAN DAN PELATIHAN</div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>DATA</th>
                                <th>TAHUN</th>
                                <th>BULAN</th>
                            </tr>
                        </thead>
                        <tbody id="summary-table-body">
                            <tr>
                                <td>Jumlah Pegawai</td>
                                <td>0</td>
                                <td id="perencanaan-tahun"></td>
                            </tr>
                            <tr>
                                <td>Jumlah Seluruh Pelanggan</td>
                                <td>0</td>
                                <td id="penelitian-tahun"></td>
                            </tr>
                            <tr>
                                <td>Rasio Diklat Pegawai</td>
                                <td>0</td>
                                <td id="pengawasan-tahun"></td>
                            </tr>
                            <tr>
                                <td>Jumlah Pegawai Yang Ikut Diklat</td>
                                <td>0</td>
                                <td id="pengawasan-tahun"></td>
                            </tr>
                            <tr>
                                <td>Realisasi Biaya Diklat</td>
                                <td>0</td>
                                <td id="pengawasan-tahun"></td>
                            </tr>
                            <tr>
                                <td>Realisasi Biaya Pegawai</td>
                                <td>0</td>
                                <td id="pengawasan-tahun"></td>
                            </tr>
                            <tr>
                                <td>KOMPOSISI PEGAWAI</td>
                                
                            </tr>
                            <tr>
                                <td>Tetap</td>
                                <td>0</td>
                                <td id="pengawasan-tahun"></td>
                            </tr>
                            <tr>
                                <td>Honor</td>
                                <td>0</td>
                                <td id="pengawasan-tahun"></td>
                            </tr>
                            <tr>
                                <td>P3K</td>
                                <td>0</td>
                                <td id="pengawasan-tahun"></td>
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
    <legend class="ml-2 w-auto px-3 border border-primary rounded"><h6>Data Bulanan</h6></legend>
 <div class="row">
    
    <div class="col">
        <div class="card">
          <div class="card-header"></div>
          <div class="card-body">
            <table class="table table-bordered">
              <thead>
                  <tr>
                      <th>NO</th>
                      <th>Jumlah Pegawai</th>
                      <th>Jumlah Seluruh Pelanggan</th>
                      <th>Rasio Diklat Pegawai</th>
                      <th>Jumlah Pegawai Yang Ikut Diklat</th>
                      <th>Realisasi Biaya Diklat</th>
                      <th>Realisasi Biaya Pegawai</th>
                      <th>Tetap</th>
                      <th>Honor</th>
                      <th>P3K</th>
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
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>1</td>
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

      {{-- <div class="modal fade" id="modal-sdm">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"  id="judul_umkes">SUMBER DAYA MANUSIA</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">


              <form action="/pp" method="POST" id="form-umkes">
                @csrf
                <input required type="hidden" id="" name="" class="form-control">
              <fieldset class="border border-primary rounded">
                <legend class="ml-2 w-auto px-3 border border-primary rounded"><h6></h6></legend>
                  
                <div class="container">
                    <div class="row">
                      <div class="col form-group">
                        <label >Jumlah Pegawai</label>
                        <input required type="number" class="form-control" name="jumlahPeg" id="jumlahPeg">
                      </div>

                      <div class="col form-group">
                        <label >Jumlah Seluruh Pelanggan</label>
                        <input required type="number" class="form-control" name="" id="">
                      </div>
                      
                    </div>
                    <div class="row">
                        <div class="col form-group">
                          <label >Jumlah Pegawai Yang Ikut Diklat</label>
                          <input required type="number" class="form-control" name="PegDiklat" id="PegDiklat">
                        </div>
  
                        <div class="col form-group">
                          <label >Realisasi Biaya Diklat</label>
                          <input required type="number" class="form-control" name="realBiayaDiklt" id="realBiayaDiklt">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col form-group">
                          <label >Realisasi Biaya Pegawai</label>
                          <input required type="number" class="form-control" name="RealBiayaPeg" id="RealBiayaPeg">
                        </div>
  
                        <div class="col form-group">
                          <label >Jumlah Seluruh Pegawai Tetap</label>
                          <input required type="number" class="form-control" name="pegTtp" id="pegTtp">
                        </div>
                        <div class="col form-group">
                          <label >Jumlah Seluruh Pegawai Honor</label>
                          <input required type="number" class="form-control" name="honor" id="honor">
                        </div>
                      </div>

                      <div class="row">
                        <div class="col form-group">
                          <label >Jumlah Seluruh Pegawai P3K</label>
                          <input required type="number" class="form-control" name="p3k" id="p3k">
                        </div>
  
                        <div class="col form-group">
                          <label >Periode</label>
                          <select name="periode" class="form-control" id="periode">
                            @foreach ($bulan as $month)
                              <option value="{{ $month }}">{{ $month }}</option>
                            @endforeach
                          </select>
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
      </div> --}}
      <div class="modal fade" id="modal-sdm">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"  id="judul_sdm">Input Data SDM</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">


              <form action="/sdmSave" method="POST" id="form-sdm">
                @csrf
                <input required type="hidden" id="idSdm" name="idSdm" class="form-control">
              <fieldset class="border border-primary rounded">
                <legend class="ml-2 w-auto px-3 border border-primary rounded"><h6>RASIO PEGAWAI TERHADAP PELANGGAN</h6></legend>
                  
                <div class="container">
                    <div class="row">
                      <div class="col form-group">
                        <label>Jumlah Pagawai</label>
                        <input required type="number" class="form-control" name="JmlPgwai" id="JmlPgwai">
                      </div>

                      <div class="col form-group">
                        <label >(Jumlah Seluruh Pelanggan / 1000 )</label>
                        <input required type="number" class="form-control" name="JmlPlgn1000" id="JmlPlgn1000">
                      </div>
                    </div>
                  </div>
                </fieldset><br>

                <fieldset class="border border-success rounded">
                <legend class="ml-2 w-auto px-3 border border-success rounded"><h6>RASIO DIKLAT PEGAWAI</h6></legend>
                  
                <div class="container">
                    <div class="row">
                      <div class="col form-group">
                        <label >Jumlah Pagawai Yang Ikut Diklat</label>
                        <input required type="number" class="form-control" name="JmlPegDiklat" id="JmlPegDiklat">
                      </div>
                    </div>
                  </div>
                </fieldset><br>

                <fieldset class="border border-info rounded">
                <legend class="ml-2 w-auto px-3 border border-info rounded" style="display:flex; justify-content:flex-end; align-items:center;"><h6>RASIO BIAYA DIKLAT</h6></legend>
                  
                <div class="container">
                    <div class="row">
                      <div class="col form-group">
                        <label>Realisasi Biaya Diklat</label>
                        <input required type="number" class="form-control" name="RealByDiklat" id="RealByDiklat">
                      </div>

                      <div class="col form-group">
                        <label >Realisasi Biaya Pegawai</label>
                        <input required type="number" class="form-control" name="RealByPeg" id="RealByPeg">
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
      <!-- /.modal -->
      @include('sweetalert::alert')
@endsection
