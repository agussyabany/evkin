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
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-prod" id="tambah_prod">Tambah Data</button>
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

      <div class="modal fade" id="modal-prod">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"  id="judul_prod">PRODUKSI</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">


              <form action="/pp" method="POST" id="form-prod">
                @csrf
                <input required type="hidden" id="" name="" class="form-control">
                <div class="row">
                  <div class="col"> 
                    <fieldset class="border border-primary rounded">
                      <legend class="ml-2 w-auto px-3 border border-primary rounded"><h6>Produksi</h6></legend>
                      <div class="container">
                        <label>Kapasitas terpasang</label>
                        <input required type="number" class="form-control" name="kapsTerpasang" id="kapsTerpasang">
                        <label>Volume Produksi</label>
                        <input required type="number" class="form-control" name="VolProduksi" id="VolProduksi">
                        {{-- <label>Ratio Operasional</label>
                        <input required type="number" class="form-control" name="" id=""> --}}
                        <label>Volume Air Baku</label>
                        <input required type="number" class="form-control" name="volAirbaku" id="volAirbaku">
                        <label>Kualitas Air Pelanggan</label>
                        <input required type="number" class="form-control" name="kualitasAir" id="kualitasAir">
                        <label>Jumlah Titik Uji Memenuhi Syarat</label>
                        <input required type="number" class="form-control" name="ttkUjiSyarat" id="ttkUjiSyarat">
                        <label>Jumlah Titik Uji</label>
                        <input required type="number" class="form-control" name="ttkUji" id="ttkUji">
                        <label>Periode</label>
                            <select name="periode" class="form-control" id="periode">
                                @foreach ($bulan as $month)
                                <option value="{{ $month }}">{{ $month }}</option>
                                @endforeach
                            </select>
                      </div><br>

                    </fieldset>
                  </div>

                  
                </div><br>
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
