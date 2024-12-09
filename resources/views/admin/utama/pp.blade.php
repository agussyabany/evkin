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
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-keuangan" id="tambah_keuangan">Tambah Data Keuangan</button>
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
            <fieldset class=" border border-primary rounded text-center">
              <legend class="border border-primary rounded">Perencanaan Teknik - RAB</legend>
            <div class="col">
              <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>KEGIATAN</th>
                        <th>JUMLAH</th>
                        <th>PERIODE</th>
                        <th>-</th>
                    </tr>
                </thead>
                <tbody id="summary-table-body">
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tbody>
            </table>
          </div>
            </fieldset>
        <fieldset class=" border border-primary rounded text-center">
          <legend class="ml-2 w-auto px-3 border border-primary rounded"><p >Penelitian - Pengumpulan Data</p></legend>
          <div class="col">
           
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
      </fieldset>


        <div class="col">
          <table class="table table-bordered">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>KEGIATAN</th>
                    <th>JUMLAH</th>
                    <th>PERIODE</th>
                    <th>-</th>
                </tr>
            </thead>
            <tbody id="summary-table-body">
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tbody>
        </table>
      </div>



          </div>
                              </div>
                            </div>

      <div class="modal fade" id="modal-keuangan">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"  id="judul_keuangan">Input Data Keuangan</h4>
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
 
@endsection
