@extends('layouts.main')

@section('title')
  EVKIN | DASHBAORAD
@endsection

@section('content')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <h1 class="m-0 text-center">INSATALASI PENGOLAHAN AIR</h1>
  </div>
  <!-- /.content-header -->
  <div class="content">
    <div class="float-right">
      @if (Auth::user()->hasAnyRole(['ipa','agus']))
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_evkeu" id="tambah_keu">TAMBAH</button>
      @endif
    </div>
  <br><br>

  <fieldset class="border border-primary rounded">
    <legend class="ml-2 w-auto px-3 border border-primary rounded"><h6>ASPEK KEUANGAN</h6></legend>


</fieldset><br>


{{-- DATA BULANAN --}}



  
 


</div>
</div>

    

      <div class="modal fade" id="modal_evkeu">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"  id="judul_evkeu">Input Data Keuangan</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">


              <form action="/keuSave" method="POST" id="form-keuangan">
                @csrf
                <input required type="hidden" id="idKeu" name="idKeu" class="form-control">
                <div class="row">
            <div class="col">
              <fieldset class="border border-primary rounded">
                <legend class="ml-2 w-auto px-3 border border-primary rounded"><h6>Intake Teluk Lerong</h6></legend>
                  
                <div class="container">
                    
                      <div class="form-group">
                        <label>Pilih Pompa</label>
                        <br>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="ipa[]" value="cendana" id="ipa_cendana">
                            <label class="form-check-label" for="ipa_cendana">Pompa 1</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="ipa[]" value="tirta_kencana" id="ipa_tirta_kencana">
                            <label class="form-check-label" for="ipa_tirta_kencana">Pompa 2</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="ipa[]" value="karang_asam" id="ipa_karang_asam">
                            <label class="form-check-label" for="ipa_karang_asam">Pompa 3</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="ipa[]" value="teluk_lerong" id="ipa_teluk_lerong">
                            <label class="form-check-label" for="ipa_teluk_lerong">Pompa 4</label>
                        </div>
                        
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-sm">
                                <thead class="thead-dark">
                                    <tr class="text-center">
                                       
                                        <th style="width:110px;">Pompa</th>
                                        <th style="width:110px;">Frekuensi</th>
                                        <th style="width:110px;">Ampere</th>
                                        <th style="width:110px;">Volt</th>
                                        <th style="width:110px;">Durasi</th>
                                        <th style="width:110px;">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        
                                        <td>1</td>

                                        <td>
                                            <input type="number" class="form-control form-control-sm text-center">
                                        </td>
                                        <td>
                                            <input type="number" class="form-control form-control-sm text-center">
                                        </td>
                                        <td>
                                            <input type="number" class="form-control form-control-sm text-center">
                                        </td>
                                        <td>
                                            <input type="number" class="form-control form-control-sm text-center">
                                        </td>
                                        <td>
                                            <select class="form-control form-control-sm">
                                                <option>ON</option>
                                                <option>OFF</option>
                                            </select>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-sm">
                                <thead class="thead-dark">
                                    <tr class="text-center">
                                        
                                        <th style="width:110px;">Pompa</th>
                                        <th style="width:110px;">Frekuensi</th>
                                        <th style="width:110px;">Ampere</th>
                                        <th style="width:110px;">Volt</th>
                                        <th style="width:110px;">Durasi</th>
                                        <th style="width:110px;">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        
                                        <td>2</td>

                                        <td>
                                            <input type="number" class="form-control form-control-sm text-center">
                                        </td>
                                        <td>
                                            <input type="number" class="form-control form-control-sm text-center">
                                        </td>
                                        <td>
                                            <input type="number" class="form-control form-control-sm text-center">
                                        </td>
                                        <td>
                                            <input type="number" class="form-control form-control-sm text-center">
                                        </td>
                                        <td>
                                            <select class="form-control form-control-sm">
                                                <option>ON</option>
                                                <option>OFF</option>
                                            </select>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-sm">
                                <thead class="thead-dark">
                                    <tr class="text-center">
                                        
                                        <th style="width:110px;">Pompa</th>
                                        <th style="width:110px;">Frekuensi</th>
                                        <th style="width:110px;">Ampere</th>
                                        <th style="width:110px;">Volt</th>
                                        <th style="width:110px;">Durasi</th>
                                        <th style="width:110px;">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        
                                        <td>3</td>

                                        <td>
                                            <input type="number" class="form-control form-control-sm text-center">
                                        </td>
                                        <td>
                                            <input type="number" class="form-control form-control-sm text-center">
                                        </td>
                                        <td>
                                            <input type="number" class="form-control form-control-sm text-center">
                                        </td>
                                        <td>
                                            <input type="number" class="form-control form-control-sm text-center">
                                        </td>
                                        <td>
                                            <select class="form-control form-control-sm">
                                                <option>ON</option>
                                                <option>OFF</option>
                                            </select>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-sm">
                                <thead class="thead-dark">
                                    <tr class="text-center">
                                       
                                        <th style="width:110px;">Pompa</th>
                                        <th style="width:110px;">Frekuensi</th>
                                        <th style="width:110px;">Ampere</th>
                                        <th style="width:110px;">Volt</th>
                                        <th style="width:110px;">Durasi</th>
                                        <th style="width:110px;">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        
                                        <td>4</td>

                                        <td>
                                            <input type="number" class="form-control form-control-sm text-center">
                                        </td>
                                        <td>
                                            <input type="number" class="form-control form-control-sm text-center">
                                        </td>
                                        <td>
                                            <input type="number" class="form-control form-control-sm text-center">
                                        </td>
                                        <td>
                                            <input type="number" class="form-control form-control-sm text-center">
                                        </td>
                                        <td>
                                            <select class="form-control form-control-sm">
                                                <option>ON</option>
                                                <option>OFF</option>
                                            </select>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    
                    
                  </div>
                  
                </fieldset>
                  </div>

                  <div class="col">
              <fieldset class="border border-primary rounded">
                <legend class="ml-2 w-auto px-3 border border-primary rounded"><h6>Intake Teluk Lerong</h6></legend>
                  
                <div class="container">
                    
                      <div class="form-group">
                        <label>Pilih Pompa</label>
                        <br>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="ipa[]" value="cendana" id="ipa_cendana">
                            <label class="form-check-label" for="ipa_cendana">Pompa 1</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="ipa[]" value="tirta_kencana" id="ipa_tirta_kencana">
                            <label class="form-check-label" for="ipa_tirta_kencana">Pompa 2</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="ipa[]" value="karang_asam" id="ipa_karang_asam">
                            <label class="form-check-label" for="ipa_karang_asam">Pompa 3</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="ipa[]" value="teluk_lerong" id="ipa_teluk_lerong">
                            <label class="form-check-label" for="ipa_teluk_lerong">Pompa 4</label>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-sm">
                                <thead class="thead-dark">
                                    <tr class="text-center">
                                        <th style="width:50px;">No</th>
                                        <th style="width:110px;">Nama Pompa</th>
                                        <th style="width:110px;">Frekuensi</th>
                                        <th style="width:110px;">Ampere</th>
                                        <th style="width:110px;">Volt</th>
                                        <th style="width:110px;">Durasi</th>
                                        <th style="width:110px;">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center">1</td>
                                        <td>Pompa 1</td>

                                        <td>
                                            <input type="number" class="form-control form-control-sm text-center">
                                        </td>
                                        <td>
                                            <input type="number" class="form-control form-control-sm text-center">
                                        </td>
                                        <td>
                                            <input type="number" class="form-control form-control-sm text-center">
                                        </td>
                                        <td>
                                            <input type="number" class="form-control form-control-sm text-center">
                                        </td>
                                        <td>
                                            <select class="form-control form-control-sm">
                                                <option>ON</option>
                                                <option>OFF</option>
                                            </select>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        
                    </div>

                    
                    
                  </div>
                  
                </fieldset>
                  </div>
                </div>
                <br>

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
      <!-- /.modal -->
      @include('sweetalert::alert')

@endsection
