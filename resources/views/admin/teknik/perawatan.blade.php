@extends('layouts.main')

@section('title')
  EVKIN | DASHBAORAD
@endsection

@section('content')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <h1 class="m-0 text-center">PERAWATAN</h1>
  </div>
  <!-- /.content-header -->
  <div class="content">
    <div class="float-right">
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-perawatan" id="tambah_perawatan">Tambah Data</button>
    </div>
  <br><br>

  <fieldset class="border border-primary rounded">
    <legend class="ml-2 w-auto px-3 border border-primary rounded"><h6>DATA KESELURUHAN</h6></legend>
          <div class="content row">
           
            
          <div class="col">
            <div class="card">
              <div class="card-header">Mekanikal Dan Elektrikal</div>
              <div class="card-body">
                <table>
                    <thead>
                        <tr>
                            <th rowspan="2">Pekerjaan</th>
                            <th colspan="3">Periode</th>
                        </tr>
                        <tr>
                            <th>TAHUN</th>
                            <th>BULAN</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="left-align">Jumlah Service</td>
                            <td></td>
                            <td></td>
                            
                        </tr>
                        <tr>
                            <td class="left-align">Dikerjakan Sendiri</td>
                            <td></td>
                            <td></td>
                           
                        </tr>
                        <tr>
                            <td class="left-align">Dikerjakan Pihak Ke 3</td>
                            <td></td>
                            <td></td>
                            
                        </tr>
                    </tbody>
                </table>

              </div>
            </div>
            
        </div>

        <div class="col">
            <div class="card">
              <div class="card-header">Bangunan Dan Kantor</div>
              <div class="card-body">
                <table>
                    <thead>
                        <tr>
                            <th rowspan="2">Pekerjaan</th>
                            <th colspan="3">Periode</th>
                        </tr>
                        <tr>
                            <th>TAHUN</th>
                            <th>BULAN</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="left-align">Jumlah Service</td>
                            <td></td>
                            <td></td>
                            
                        </tr>
                        <tr>
                            <td class="left-align">Dikerjakan Sendiri</td>
                            <td></td>
                            <td></td>
                           
                        </tr>
                        <tr>
                            <td class="left-align">Dikerjakan Pihak Ke 3</td>
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
    <legend class="ml-2 w-auto px-3 border border-primary rounded"><h6>Mekanikal Dan Elektrikal</h6></legend>
 <div class="row">
    
    <div class="col">
        <div class="card">
          <div class="card-header"></div>
          <div class="card-body">
            <table class="table table-bordered">
              <thead>
                  <tr>
                      <th>NO</th>
                      <th>Jumlah Service</th>
                      <th>Dikerjakan Sendiri</th>
                      <th>Dikerjakan Pihak Ke 3</th>
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

<fieldset class="border border-primary rounded">
  <legend class="ml-2 w-auto px-3 border border-primary rounded"><h6>Bangunan Dan Kantor</h6></legend>
<div class="row">
  
  <div class="col">
      <div class="card">
        <div class="card-header"></div>
        <div class="card-body">
          <table class="table table-bordered">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>Jumlah Service</th>
                    <th>Dikerjakan Sendiri</th>
                    <th>Dikerjakan Pihak Ke 3</th>
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

      <div class="modal fade" id="modal-perawatan">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"  id="judul_perawatan">PERAWATAN</h4>
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
                      <legend class="ml-2 w-auto px-3 border border-primary rounded"><h6>Mekanikal Dan Elektrikal</h6></legend>
                      <div class="container">
                        <label>Jumlah Service</label>
                        <input required type="number" class="form-control" name="jumSrv" id="jumSrv">
                        <label>Dikerjakan Sendiri</label>
                        <input required type="number" class="form-control" name="sendiri" id="sendiri">
                        {{-- <label>Ratio Operasional</label>
                        <input required type="number" class="form-control" name="" id=""> --}}
                        <label>Dikerjakan Pihak Ke 3</label>
                        <input required type="number" class="form-control" name="pihakTiga" id="pihakTiga">

                      </div><br>

                    </fieldset>
                  </div>

                  <div class="col"> 
                    <fieldset class="border border-primary rounded">
                      <legend class="ml-2 w-auto px-3 border border-primary rounded"><h6>Banguanan Dan Kantor</h6></legend>
                      <div class="container">
                        <label>Jumlah Service</label>
                        <input required type="number" class="form-control" name="jumSrvBk" id="jumSrvBk">
                        <label>Dikerjakan Sendiri</label>
                        <input required type="number" class="form-control" name="sendiriBk" id="sendiriBk">
                        {{-- <label>Ratio Operasional</label>
                        <input required type="number" class="form-control" name="" id=""> --}}
                        <label>Dikerjakan Pihak Ke 3</label>
                        <input required type="number" class="form-control" name="pihakTigaBk" id="pihakTigaBk">
                        
                      </div><br>

                    </fieldset>
                  </div>
                </div><br>

                <label>Periode</label>
                            <select name="periode" class="form-control" id="periode">
                                @foreach ($bulan as $month)
                                <option value="{{ $month }}">{{ $month }}</option>
                                @endforeach
                            </select>
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
