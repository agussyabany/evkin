@extends('layouts.main')

@section('title')
  EVKIN | DASHBAORAD
@endsection

@section('content')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <h1 class="m-0 text-center">PERENCANAAN DAN PENELITIAN</h1>
  </div>
  <!-- /.content-header -->
  <div class="content">
    <div class="float-right">
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-pp" id="tambah_keuangan">Tambah Data</button>
    </div>
  <br><br>
                                    <table class="table table-bordered">
                                      <thead>
                                          <tr>
                                              <th>DIVISI</th>
                                              <th>Kegiatan</th>
                                              <th>TAHUN</th>
                                              <th>BULAN</th>
                                              <th>HARI INI</th>
                                          </tr>
                                      </thead>
                                      <tbody id="summary-table-body">
                                          <tr>
                                              <td>Perencanaan</td>
                                              <td>Jumlah RAB</td>
                                              <td id="perencanaan-tahun"></td>
                                              <td id="perencanaan-bulan"></td>
                                              <td id="perencanaan-hari"></td>
                                          </tr>
                                          <tr>
                                              <td>Penelitian</td>
                                              <td>Jumlah Pengumpulan Data</td>
                                              <td id="penelitian-tahun"></td>
                                              <td id="penelitian-bulan"></td>
                                              <td id="penelitian-hari"></td>
                                          </tr>
                                          <tr>
                                              <td>Pengawasan</td>
                                              <td>Jumlah Pekerjaan Diawasi</td>
                                              <td id="pengawasan-tahun"></td>
                                              <td id="pengawasan-bulan"></td>
                                              <td id="pengawasan-hari"></td>
                                          </tr>
                                      </tbody>
                                  </table>


          <div class="row">
           
            <div class="col">
              <div class="card">
                <div class="card-header">PERENCANAAN - RAB</div>
                <div class="card-body">
                  <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>JUMLAH</th>
                            <th>PERIODE</th>
                            <th>-</th>
                        </tr>
                    </thead>
                    <tbody id="summary-table-body">
                        <td></td>
                        <td></td>
                        <td></td>
                    </tbody>
                </table>

                </div>
              </div>
              
          </div>
            
          <div class="col">
            <div class="card">
              <div class="card-header">PENGAWAS FISIK -  PEKERJAAN DIAWASI</div>
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                      <tr>
                          <th>NO</th>
                          <th>JUMLAH</th>
                          <th>PERIODE</th>
                          <th>-</th>
                      </tr>
                  </thead>
                  <tbody id="summary-table-body">
                      <td></td>
                      <td></td>
                      <td></td>
                  </tbody>
              </table>

              </div>
            </div>
            
        </div>


        <div class="col">
          <div class="card">
            <div class="card-header">PENELITIAN - PENGUMPULAN DATA</div>
            <div class="card-body">
              <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>JUMLAH</th>
                        <th>PERIODE</th>
                        <th>-</th>
                    </tr>
                </thead>
                <tbody id="summary-table-body">
                    <td></td>
                    <td></td>
                    <td></td>
                </tbody>
            </table>

            </div>
          </div>
          
      </div>



          </div>
                              </div>
                            </div>

      <div class="modal fade" id="modal-pp">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"  id="judul_pp">Perencanaan Penelitian Pengawasan</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">


              <form action="/ppStore" method="POST" id="form-pp">
                @csrf
                <input required type="hidden" id="" name="" class="form-control">
                <div class="row">
                  <div class="col">
                    <fieldset class="border border-primary rounded">
                      <legend class="ml-2 w-auto px-3 border border-primary rounded"><h6>Perencanaan Teknik</h6></legend>
                        
                      <div class="container">
                        <div class="col form-group">
                              <label >Jumlah RAB</label>
                              <input required type="number" class="form-control" name="rab" id="rab">
                            </div>
                          </div>
                      </fieldset><br>

                  </div>

                  <div class="col">
                    <fieldset class="border border-success rounded">
                      <legend class="ml-2 w-auto px-3 border border-success rounded"><h6>Pengawas Fisik</h6></legend>
                        
                      <div class="container">
                        <div class="col form-group">
                              <label>Jumlah Pekerjan Diawasi</label>
                              <input required type="number" class="form-control" name="pengawasan" id="pengawasan">
                            </div>
                          </div>
                      </fieldset><br>
                     </div>

                     <div class="col">

                      <fieldset class="border border-success rounded">
                        <legend class="ml-2 w-auto px-3 border border-success rounded"><h6>Penelitian</h6></legend>
                          
                        <div class="container">
                          <div class="col form-group">
                            <label >Jumlah Data</label>
                            <input required type="number" class="form-control" name="data" id="data">
                              </div>
                            </div>
                        </fieldset><br>
                      </div>
                </div>
              

                

                <fieldset class="border border-info rounded">
                <legend class="ml-2 w-auto px-3 border border-info rounded" style="display:flex; justify-content:flex-end; align-items:center;"><h6>Periode</h6></legend>
                  
                <div class="container">
                  <div class="col form-group">
                    <div class="col form-group">
                      <label>Periode</label>
                      <select name="periodData" class="form-control" id="period">
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
              <div class="float-end"><button type="submit" class="btn btn-primary">SIMPAN</button></div>
            </div>
          </form>


          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
 
@endsection
