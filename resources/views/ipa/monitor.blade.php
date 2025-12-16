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
                    
                      <form method="POST">

<!-- ================= PILIH POMPA ================= -->
<div class="form-group">
    <label>Pilih Pompa</label><br>

    <!-- Pompa 1 -->
    <div class="form-check form-check-inline">
        <input type="hidden" name="pompa[1][id_pompa]" value="101">
        <input type="hidden" name="pompa[1][status]" value="OFF">

        <input class="form-check-input cek-pompa"
               type="checkbox"
               id="cek_pompa1"
               data-target="pompa1"
               name="pompa[1][status]"
               value="ON">

        <label class="form-check-label" for="cek_pompa1">Pompa 1</label>
    </div>

    <!-- Pompa 2 -->
    <div class="form-check form-check-inline">
        <input type="hidden" name="pompa[2][id_pompa]" value="102">
        <input type="hidden" name="pompa[2][status]" value="OFF">

        <input class="form-check-input cek-pompa"
               type="checkbox"
               id="cek_pompa2"
               data-target="pompa2"
               name="pompa[2][status]"
               value="ON">

        <label class="form-check-label" for="cek_pompa2">Pompa 2</label>
    </div>

    <!-- Pompa 3 -->
    <div class="form-check form-check-inline">
        <input type="hidden" name="pompa[3][id_pompa]" value="103">
        <input type="hidden" name="pompa[3][status]" value="OFF">

        <input class="form-check-input cek-pompa"
               type="checkbox"
               id="cek_pompa3"
               data-target="pompa3"
               name="pompa[3][status]"
               value="ON">

        <label class="form-check-label" for="cek_pompa3">Pompa 3</label>
    </div>

    <!-- Pompa 4 -->
    <div class="form-check form-check-inline">
        <input type="hidden" name="pompa[4][id_pompa]" value="104">
        <input type="hidden" name="pompa[4][status]" value="OFF">

        <input class="form-check-input cek-pompa"
               type="checkbox"
               id="cek_pompa4"
               data-target="pompa4"
               name="pompa[4][status]"
               value="ON">

        <label class="form-check-label" for="cek_pompa4">Pompa 4</label>
    </div>
</div>

<!-- ================= TABLE POMPA 1 ================= -->
<div class="table-responsive pompa-table" id="pompa1" style="display:none;">
    <table class="table table-bordered table-striped table-sm">
        <thead class="thead-dark text-center">
            <tr>
                <th>Pompa</th>
                <th>Frekuensi</th>
                <th>Ampere</th>
                <th>Volt</th>
                <th>Durasi</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="text-center">1</td>
                <td><input type="number" name="pompa[1][frekuensi]" class="form-control form-control-sm text-center"></td>
                <td><input type="number" name="pompa[1][ampere]"   class="form-control form-control-sm text-center"></td>
                <td><input type="number" name="pompa[1][volt]"     class="form-control form-control-sm text-center"></td>
                <td><input type="number" name="pompa[1][durasi]"   class="form-control form-control-sm text-center"></td>
            </tr>
        </tbody>
    </table>
</div>

<!-- ================= TABLE POMPA 2 ================= -->
<div class="table-responsive pompa-table" id="pompa2" style="display:none;">
    <table class="table table-bordered table-striped table-sm">
        <thead class="thead-dark text-center">
            <tr>
                <th>Pompa</th>
                <th>Frekuensi</th>
                <th>Ampere</th>
                <th>Volt</th>
                <th>Durasi</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="text-center">2</td>
                <td><input type="number" name="pompa[2][frekuensi]" class="form-control form-control-sm text-center"></td>
                <td><input type="number" name="pompa[2][ampere]"   class="form-control form-control-sm text-center"></td>
                <td><input type="number" name="pompa[2][volt]"     class="form-control form-control-sm text-center"></td>
                <td><input type="number" name="pompa[2][durasi]"   class="form-control form-control-sm text-center"></td>
            </tr>
        </tbody>
    </table>
</div>

<!-- ================= TABLE POMPA 3 ================= -->
<div class="table-responsive pompa-table" id="pompa3" style="display:none;">
    <table class="table table-bordered table-striped table-sm">
        <thead class="thead-dark text-center">
            <tr>
                <th>Pompa</th>
                <th>Frekuensi</th>
                <th>Ampere</th>
                <th>Volt</th>
                <th>Durasi</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="text-center">3</td>
                <td><input type="number" name="pompa[3][frekuensi]" class="form-control form-control-sm text-center"></td>
                <td><input type="number" name="pompa[3][ampere]"   class="form-control form-control-sm text-center"></td>
                <td><input type="number" name="pompa[3][volt]"     class="form-control form-control-sm text-center"></td>
                <td><input type="number" name="pompa[3][durasi]"   class="form-control form-control-sm text-center"></td>
            </tr>
        </tbody>
    </table>
</div>

<!-- ================= TABLE POMPA 4 ================= -->
<div class="table-responsive pompa-table" id="pompa4" style="display:none;">
    <table class="table table-bordered table-striped table-sm">
        <thead class="thead-dark text-center">
            <tr>
                <th>Pompa</th>
                <th>Frekuensi</th>
                <th>Ampere</th>
                <th>Volt</th>
                <th>Durasi</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="text-center">4</td>
                <td><input type="number" name="pompa[4][frekuensi]" class="form-control form-control-sm text-center"></td>
                <td><input type="number" name="pompa[4][ampere]"   class="form-control form-control-sm text-center"></td>
                <td><input type="number" name="pompa[4][volt]"     class="form-control form-control-sm text-center"></td>
                <td><input type="number" name="pompa[4][durasi]"   class="form-control form-control-sm text-center"></td>
            </tr>
        </tbody>
    </table>
</div>

</form>

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
