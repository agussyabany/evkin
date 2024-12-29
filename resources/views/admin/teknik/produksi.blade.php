@extends('layouts.main')

@section('title')
  EVKIN | DASHBAORAD
@endsection

@section('content')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <h1 class="m-0 text-center">PRODUKSI</h1>
  </div>
  <!-- /.content-header -->
  <div class="content">
    <div class="float-right">
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_operasional" id="tambah_prod">Tambah Data</button>
    </div>
  <br><br>
  
  

  <fieldset class="border border-primary rounded">
    <legend class="ml-2 w-auto px-3 border border-primary rounded"><h6>DATA KESELURUHAN</h6></legend>
          <div class="content row">
           
            
          <div class="col">
            <div class="card">
              <div class="card-header">PRODUKSI</div>
              <div class="card-body">
                <table>
                    <thead>
                        <tr>
                            <th rowspan="2">Rasio Produksi</th>
                            <th colspan="3">Periode</th>
                        </tr>
                        <tr>
                            <th>TAHUN</th>
                            <th>BULAN</th>
                            <th>HARI INI</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="left-align">a. Kapasitas terpasang</td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td class="left-align">b. Volume Produksi</td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td class="left-align">c. Volume Air Baku</td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td class="left-align">d. Kualitas Air Pelanggan</td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td class="left-align"><strong>Jumlah Titik Uji Memenuhi Syarat</strong></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td class="left-align"><strong>Jumlah Titik Uji</strong></td>
                            <td></td>
                            <td></td>
                            <td></td>
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
                      <th>Kapasitas terpasang</th>
                      <th>Volume Produksi</th>
                      <th>Volume Air Baku</th>
                      <th>Kualitas Air Pelanggan</th>
                      <th>Jumlah Titik Uji Memenuhi Syarat</th>
                      <th>Jumlah Titik Uji</th>
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
                    <td></td>
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

       <div class="modal fade" id="modal_operasional">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"  id="judul_operasional">Input Data Operasional</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">


              <form action="/opSave" method="POST" id="form-operasional">
                @csrf
                <input required type="hidden" id="idOps" name="idOps" class="form-control">
              <fieldset class="border border-primary rounded">
                <legend class="ml-2 w-auto px-3 border border-primary rounded"><h6>Rasio Produksi</h6></legend>
                  
                <div class="container">
                    <div class="row">
                      <div class="col form-group">
                        <label >Volume Produksi Riil</label>
                        <input required type="number" class="form-control" name="VolProdRil" id="VolProdRil">
                      </div>

                      <div class="col form-group">
                        <label >Jumlah Kapasitas Terpasang</label>
                        <input required type="number" class="form-control" name="KpstsTrpsng" id="KpstsTrpsng">
                      </div>
                    </div>
                  </div>
                </fieldset><br>

                <fieldset class="border border-success rounded">
                <legend class="ml-2 w-auto px-3 border border-success rounded"><h6>Kehilangan Air</h6></legend>
                  
                <div class="container">
                    <div class="row">
                      <div class="col form-group">
                        <label >Air Disistribusikan - Air Terjual</label>
                        <input required type="number" class="form-control" name="KalkulasiJumAir" id="KalkulasiJumAir">
                      </div>

                      <div class="col form-group">
                        <label>Jumlah Air Didistribusikan</label>
                        <input required type="number" class="form-control" name="JmlAirDist" id="JmlAirDist">
                      </div>
                    </div>
                  </div>
                </fieldset><br>

                <fieldset class="border border-info rounded">
                <legend class="ml-2 w-auto px-3 border border-info rounded" style="display:flex; justify-content:flex-end; align-items:center;"><h6>Jam Operasi Layanan</h6></legend>
                  
                <div class="container">
                    <div class="row">
                      <div class="col form-group">
                        <label >Jumlah Waktu Pelayanan/Distribusi Air ke Pelanggan dalam Setahun</label>
                        <input required type="number" class="form-control" name="JmlWktPly" id="JmlWktPly">
                      </div>

                      <div class="col form-group">
                        <label >Jumlah Hari</label>
                        <input required type="number" class="form-control" name="HutangLancar" id="HutangLancar">
                      </div>
                    </div>
                  </div>
                </fieldset><br>

                <fieldset class="border border-warning rounded">
                <legend class="ml-2 w-auto px-3 border border-warning rounded" style="display:flex; justify-content:flex-end; align-items:center;"><h6>Tekanan Air Pada SL</h6></legend>
                  
                <div class="container">
                    <div class="row">
                      <div class="col form-group">
                        <label>Jumlah Pelanggan yang Dilayanai dengan Tekanan > 0,7 Bar</label>
                        <input required type="number" class="form-control" name="Plgnlayan" id="Plgnlayan">
                      </div>

                      <div class="col form-group">
                        <label>Jumlah Pelanggan Aktiv</label>
                        <input required type="number" class="form-control" name="PlgnAktiv" id="PlgnAktiv">
                      </div>
                    </div>
                  </div>
                </fieldset><br>


                <fieldset class="border border-secondary rounded">
                <legend class="ml-2 w-auto px-3 border border-secondary rounded" style="display:flex; justify-content:flex-end; align-items:center;"><h6>Penggantian / Kalibarasi Meter</h6></legend>
                  
                <div class="container">
                    <div class="row">

                      <div class="col form-group">
                        <label>Jml Meter yg diganti/kalibrasi dalam setahun</label>
                        <input required type="number" class="form-control" name="MtrAirGnti" id="MtrAirGnti">
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
      @include('sweetalert::alert')
@endsection
