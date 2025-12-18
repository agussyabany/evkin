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
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_ipa" id="tambah_ipa">TAMBAH</button>
      @endif
    </div>
  <br><br>

  <fieldset class="border border-primary rounded">
    <legend class="ml-2 w-auto px-3 border border-primary rounded"><h6>ASPEK KEUANGAN</h6></legend>


</fieldset><br>


{{-- DATA BULANAN --}}



  
 


</div>
</div>

    

      <div class="modal fade" id="modal_ipa">
        <div class="modal-dialog modal-xl modal-xxl-custom">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"  id="judul_ipa">Input Data IPA</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">


                      <form action="/save" method="POST" id="form-ipa">
                          @csrf
                                  
                            <div class="row">
                              <div class="col">
                                <fieldset class="border border-primary rounded">
                                  <legend class="ml-2 w-auto px-3 border border-primary rounded"><h6>Intake Teluk Lerong</h6></legend>
                                  <div class="container">
                                    

                                          <!-- ================= PILIH POMPA ================= -->
                                          <div class="form-group">
                                              <label>Pilih Pompa</label><br>

                                              <!-- Pompa 1 -->
                                              <div class="form-check form-check-inline">
                                                  <input type="hidden" name="pompa[1][id_pompa]" value="1">
                                                  <input type="hidden" name="pompa[1][status]" value="0">

                                                  <input class="form-check-input cek-pompa"
                                                        type="checkbox"
                                                        id="cek_pompa1"
                                                        data-target="pompa1"
                                                        name="pompa[1][status]"
                                                        value="1">

                                                  <label class="form-check-label" for="cek_pompa1">Pompa 1</label>
                                              </div>

                                              <!-- Pompa 2 -->
                                              <div class="form-check form-check-inline">
                                                  <input type="hidden" name="pompa[2][id_pompa]" value="2">
                                                  <input type="hidden" name="pompa[2][status]" value="0">

                                                  <input class="form-check-input cek-pompa"
                                                        type="checkbox"
                                                        id="cek_pompa2"
                                                        data-target="pompa2"
                                                        name="pompa[2][status]"
                                                        value="1">

                                                  <label class="form-check-label" for="cek_pompa2">Pompa 2</label>
                                              </div>

                                              <!-- Pompa 3 -->
                                              <div class="form-check form-check-inline">
                                                  <input type="hidden" name="pompa[3][id_pompa]" value="3">
                                                  <input type="hidden" name="pompa[3][status]" value="0">

                                                  <input class="form-check-input cek-pompa"
                                                        type="checkbox"
                                                        id="cek_pompa3"
                                                        data-target="pompa3"
                                                        name="pompa[3][status]"
                                                        value="1">

                                                  <label class="form-check-label" for="cek_pompa3">Pompa 3</label>
                                              </div>

                                              <!-- Pompa 4 -->
                                              <div class="form-check form-check-inline">
                                                  <input type="hidden" name="pompa[4][id_pompa]" value="4">
                                                  <input type="hidden" name="pompa[4][status]" value="0">

                                                  <input class="form-check-input cek-pompa"
                                                        type="checkbox"
                                                        id="cek_pompa4"
                                                        data-target="pompa4"
                                                        name="pompa[4][status]"
                                                        value="1">

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
                                                          <td><input type="number" name="pompa[1][frekuensi]" class="form-control form-control-sm text-center" step="any" value="40.1" placeholder="contoh: 40.7"></td>
                                                          <td><input type="number" name="pompa[1][ampere]"   class="form-control form-control-sm text-center" step="any" value="6.1" placeholder="contoh: 40.7"></td>
                                                          <td><input type="number" name="pompa[1][volt]"     class="form-control form-control-sm text-center" step="any" value="220.1" placeholder="contoh: 40.7"></td>
                                                          <td><input type="number" name="pompa[1][durasi]" value="24"   class="form-control form-control-sm text-center"></td>
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
                                                          <td><input type="number" name="pompa[2][frekuensi]" class="form-control form-control-sm text-center" step="any" value="40.2" placeholder="contoh: 40.7"></td>
                                                          <td><input type="number" name="pompa[2][ampere]"   class="form-control form-control-sm text-center" step="any" value="6.2" placeholder="contoh: 40.7"></td>
                                                          <td><input type="number" name="pompa[2][volt]"     class="form-control form-control-sm text-center" step="any" value="220.2" placeholder="contoh: 40.7"></td>
                                                          <td><input type="number" name="pompa[2][durasi]" value="25"   class="form-control form-control-sm text-center"></td>
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
                                                          <td><input type="number" name="pompa[3][frekuensi]" class="form-control form-control-sm text-center" step="any" value="40.3" placeholder="contoh: 40.7"></td>
                                                          <td><input type="number" name="pompa[3][ampere]"   class="form-control form-control-sm text-center" step="any" value="6.3" placeholder="contoh: 40.7"></td>
                                                          <td><input type="number" name="pompa[3][volt]"     class="form-control form-control-sm text-center" step="any" value="220.3" placeholder="contoh: 40.7"></td>
                                                          <td><input type="number" value="26" name="pompa[3][durasi]"   class="form-control form-control-sm text-center" ></td>
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
                                                          <td><input type="number" name="pompa[4][frekuensi]" class="form-control form-control-sm text-center" step="any" value="40.4" placeholder="contoh: 40.7"></td>
                                                          <td><input type="number" name="pompa[4][ampere]"   class="form-control form-control-sm text-center" step="any" value="6.4" placeholder="contoh: 40.7"></td>
                                                          <td><input type="number" name="pompa[4][volt]"     class="form-control form-control-sm text-center" step="any" value="220.4" placeholder="contoh: 40.7"></td>
                                                          <td><input type="number" value="45" name="pompa[4][durasi]"   class="form-control form-control-sm text-center"></td>
                                                      </tr>
                                                  </tbody>
                                              </table>
                                          </div>

                                           <div class="table-responsive" id="">
                                              <table class="table table-bordered table-striped table-sm">
                                                  <thead class="thead-dark text-center">
                                                      <tr>
                                                          
                                                          <th>FLOW/DEBIT</th>
                                                          <th>TOTALIZER</th>
                                                          
                                                      </tr>
                                                  </thead>
                                                  <tbody>
                                                      <tr>
                                                         <input type="hidden" value="1" name="id_intake[1]">
                                                          <td><input type="number" name="flow[1]"   class="form-control form-control-sm text-center" step="any" value="150.1" placeholder="contoh: 40.7"></td>
                                                          <td><input type="number" value="12345678" name="total[1]"     class="form-control form-control-sm text-center"></td>
                                                      </tr>
                                                  </tbody>
                                              </table>
                                          </div>

                                    
                                  </div>
                                </fieldset>
                              </div>
                              <div class="col">
                                <fieldset class="border border-primary rounded">
                                  <legend class="ml-2 w-auto px-3 border border-primary rounded"><h6>Intake Karang Asam</h6></legend>
                                  <div class="container">
                                    

                                          <!-- ================= PILIH POMPA KARANG ASAM ================= -->
                                          <div class="form-group">
                                              <label>Pilih Pompa</label><br>

                                              <!-- Pompa 1 KARANG ASAM -->
                                              <div class="form-check form-check-inline">
                                                  <input type="hidden" name="pompa[5][id_pompa]" value="5">
                                                  <input type="hidden" name="pompa[5][status]" value="0">

                                                  <input class="form-check-input cek-pompa"
                                                        type="checkbox"
                                                        id="cek_pompa5"
                                                        data-target="pompa5"
                                                        name="pompa[5][status]"
                                                        value="1">

                                                  <label class="form-check-label" for="cek_pompa5">Pompa 1</label>
                                              </div>

                                              <!-- Pompa 2 KARANG ASAM -->
                                              <div class="form-check form-check-inline">
                                                  <input type="hidden" name="pompa[6][id_pompa]" value="6">
                                                  <input type="hidden" name="pompa[6][status]" value="0">

                                                  <input class="form-check-input cek-pompa"
                                                        type="checkbox"
                                                        id="cek_pompa6"
                                                        data-target="pompa6"
                                                        name="pompa[6][status]"
                                                        value="1">

                                                  <label class="form-check-label" for="cek_pompa6">Pompa 2</label>
                                              </div>

                                              <!-- Pompa 3 KARANG ASAM -->
                                              <div class="form-check form-check-inline">
                                                  <input type="hidden" name="pompa[7][id_pompa]" value="7">
                                                  <input type="hidden" name="pompa[7][status]" value="0">

                                                  <input class="form-check-input cek-pompa"
                                                        type="checkbox"
                                                        id="cek_pompa7"
                                                        data-target="pompa7"
                                                        name="pompa[7][status]"
                                                        value="1">

                                                  <label class="form-check-label" for="cek_pompa7">Pompa 3</label>
                                              </div>

                                              <!-- Pompa 4 KARANG ASAM -->
                                              <div class="form-check form-check-inline">
                                                  <input type="hidden" name="pompa[8][id_pompa]" value="8">
                                                  <input type="hidden" name="pompa[8][status]" value="0">

                                                  <input class="form-check-input cek-pompa"
                                                        type="checkbox"
                                                        id="cek_pompa8"
                                                        data-target="pompa8"
                                                        name="pompa[8][status]"
                                                        value="1">

                                                  <label class="form-check-label" for="cek_pompa8">Pompa 4</label>
                                              </div>
                                          </div>

                                          <!-- ================= TABLE POMPA 1 KARANG ASAM ================= -->
                                          <div class="table-responsive pompa-table" id="pompa5" style="display:none;">
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
                                                          <td><input type="number" name="pompa[5][frekuensi]" class="form-control form-control-sm text-center" step="any" value="40.5" placeholder="contoh: 40.7"></td>
                                                          <td><input type="number" name="pompa[5][ampere]"   class="form-control form-control-sm text-center" step="any" value="6.5" placeholder="contoh: 40.7"></td>
                                                          <td><input type="number" name="pompa[5][volt]"     class="form-control form-control-sm text-center" step="any" value="220.5" placeholder="contoh: 40.7"></td>
                                                          <td><input type="number" value="40" name="pompa[5][durasi]"   class="form-control form-control-sm text-center"></td>
                                                      </tr>
                                                  </tbody>
                                              </table>
                                          </div>

                                          <!-- ================= TABLE POMPA 2 KARANG ASAM ================= -->
                                          <div class="table-responsive pompa-table" id="pompa6" style="display:none;">
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
                                                          <td><input type="number" name="pompa[6][frekuensi]" class="form-control form-control-sm text-center" step="any" value="40.6" placeholder="contoh: 40.7"></td>
                                                          <td><input type="number" name="pompa[6][ampere]"   class="form-control form-control-sm text-center" step="any" value="6.6" placeholder="contoh: 40.7"></td>
                                                          <td><input type="number" value="220.6" name="pompa[6][volt]"     class="form-control form-control-sm text-center" step="any" value="220" placeholder="contoh: 40.7"></td>
                                                          <td><input type="number" value="34" name="pompa[6][durasi]"   class="form-control form-control-sm text-center"></td>
                                                      </tr>
                                                  </tbody>
                                              </table>
                                          </div>

                                          <!-- ================= TABLE POMPA 3 KARANG ASAM ================= -->
                                          <div class="table-responsive pompa-table" id="pompa7" style="display:none;">
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
                                                          <td><input type="number" name="pompa[7][frekuensi]" class="form-control form-control-sm text-center" step="any" value="40.7" placeholder="contoh: 40.7"></td>
                                                          <td><input type="number" name="pompa[7][ampere]"   class="form-control form-control-sm text-center" step="any" value="6.7" placeholder="contoh: 40.7"></td>
                                                          <td><input type="number" name="pompa[7][volt]"     class="form-control form-control-sm text-center" step="any" value="220.7" placeholder="contoh: 40.7"></td>
                                                          <td><input type="number" value="90" name="pompa[7][durasi]"   class="form-control form-control-sm text-center"></td>
                                                      </tr>
                                                  </tbody>
                                              </table>
                                          </div>

                                          <!-- ================= TABLE POMPA 4 KARANG ASAM ================= -->
                                          <div class="table-responsive pompa-table" id="pompa8" style="display:none;">
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
                                                          <td><input type="number" name="pompa[8][frekuensi]" class="form-control form-control-sm text-center" step="any" value="40.8" placeholder="contoh: 40.7"></td>
                                                          <td><input type="number" name="pompa[8][ampere]"   class="form-control form-control-sm text-center" step="any" value="6.8" placeholder="contoh: 40.7"></td>
                                                          <td><input type="number" value="220.8" name="pompa[8][volt]"     class="form-control form-control-sm text-center" step="any" value="220." placeholder="contoh: 40.7"></td>
                                                          <td><input type="number" value="90" name="pompa[8][durasi]"   class="form-control form-control-sm text-center"></td>
                                                      </tr>
                                                  </tbody>
                                              </table>
                                          </div>

                                           <div class="table-responsive" id="">
                                              <table class="table table-bordered table-striped table-sm">
                                                  <thead class="thead-dark text-center">
                                                      <tr>
                                                          
                                                          <th>FLOW/DEBIT</th>
                                                          <th>TOTALIZER</th>
                                                          
                                                      </tr>
                                                  </thead>
                                                  <tbody>
                                                      <tr>
                                                          <input type="hidden" value="2" name="id_intake[2]">
                                                          
                                                          <td><input type="number" name="flow[2]"   class="form-control form-control-sm text-center" step="any" value="150.2" placeholder="contoh: 40.7"></td>
                                                          <td><input type="number" value="98765443" name="total[2]"     class="form-control form-control-sm text-center"></td>
                                                      </tr>
                                                  </tbody>
                                              </table>
                                          </div>

                                    
                                  </div>
                                </fieldset><br>


                                
                    </div>
                </div>
                        <div class="row">
                            <div class="col-lg-4 col-md-6 mb-3">
                                       <fieldset class="border border-warning rounded">
                                            <legend class="ml-2 w-auto px-3 border border-warning rounded"><h6>RESERVOAR 1</h6></legend>
                                            <div class="container">
                                    

                                          <!-- ================= PILIH POMPA RESERVOAR 1 ================= -->
                                          <div class="form-group">
                                              <label>Pilih Pompa</label><br>

                                              <!-- Pompa 1 RESERVOAR 1 -->
                                              <div class="form-check form-check-inline">
                                                  <input type="hidden" name="pompa[9][id_pompa]" value="9">
                                                  <input type="hidden" name="pompa[9][status]" value="0">

                                                  <input class="form-check-input cek-pompa"
                                                        type="checkbox"
                                                        id="cek_pompa9"
                                                        data-target="pompa9"
                                                        name="pompa[9][status]"
                                                        value="1">

                                                  <label class="form-check-label" for="cek_pompa9">Pompa 1</label>
                                              </div>

                                              <!-- Pompa 2 RESERVAOR 1 -->
                                              <div class="form-check form-check-inline">
                                                  <input type="hidden" name="pompa[10][id_pompa]" value="10">
                                                  <input type="hidden" name="pompa[10][status]" value="0">

                                                  <input class="form-check-input cek-pompa"
                                                        type="checkbox"
                                                        id="cek_pompa10"
                                                        data-target="pompa10"
                                                        name="pompa[10][status]"
                                                        value="1">

                                                  <label class="form-check-label" for="cek_pompa10">Pompa 2</label>
                                              </div>

                                              <!-- Pompa 3 RESERVAOR 1 -->
                                              <div class="form-check form-check-inline">
                                                  <input type="hidden" name="pompa[11][id_pompa]" value="11">
                                                  <input type="hidden" name="pompa[11][status]" value="0">

                                                  <input class="form-check-input cek-pompa"
                                                        type="checkbox"
                                                        id="cek_pompa11"
                                                        data-target="pompa11"
                                                        name="pompa[11][status]"
                                                        value="1">

                                                  <label class="form-check-label" for="cek_pompa11">Pompa 3</label>
                                              </div>

                                              <!-- Pompa 4 RESERVAOR 1 -->
                                              <div class="form-check form-check-inline">
                                                  <input type="hidden" name="pompa[12][id_pompa]" value="12">
                                                  <input type="hidden" name="pompa[12][status]" value="0">

                                                  <input class="form-check-input cek-pompa"
                                                        type="checkbox"
                                                        id="cek_pompa12"
                                                        data-target="pompa12"
                                                        name="pompa[12][status]"
                                                        value="1">

                                                  <label class="form-check-label" for="cek_pompa12">Pompa 4</label>
                                              </div>
                                          </div>

                                          <!-- ================= TABLE POMPA 1 RESERVOAR 1 ================= -->
                                          <div class="table-responsive pompa-table" id="pompa9" style="display:none;">
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
                                                          <td><input type="number" name="pompa[9][frekuensi]" class="form-control form-control-sm text-center" step="any" value="40.5" placeholder="contoh: 40.7"></td>
                                                          <td><input type="number" name="pompa[9][ampere]"   class="form-control form-control-sm text-center" step="any" value="6.5" placeholder="contoh: 40.7"></td>
                                                          <td><input type="number" name="pompa[9][volt]"     class="form-control form-control-sm text-center" step="any" value="220.5" placeholder="contoh: 40.7"></td>
                                                          <td><input type="number" value="40" name="pompa[9][durasi]"   class="form-control form-control-sm text-center"></td>
                                                      </tr>
                                                  </tbody>
                                              </table>
                                          </div>

                                          <!-- ================= TABLE POMPA 2 RESERVOAR 1 ================= -->
                                          <div class="table-responsive pompa-table" id="pompa10" style="display:none;">
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
                                                          <td><input type="number" name="pompa[10][frekuensi]" class="form-control form-control-sm text-center" step="any" value="40.6" placeholder="contoh: 40.7"></td>
                                                          <td><input type="number" name="pompa[10][ampere]"   class="form-control form-control-sm text-center" step="any" value="6.6" placeholder="contoh: 40.7"></td>
                                                          <td><input type="number" value="220.6" name="pompa[10][volt]"     class="form-control form-control-sm text-center" step="any" value="220" placeholder="contoh: 40.7"></td>
                                                          <td><input type="number" value="34" name="pompa[10][durasi]"   class="form-control form-control-sm text-center"></td>
                                                      </tr>
                                                  </tbody>
                                              </table>
                                          </div>

                                          <!-- ================= TABLE POMPA 3 RESEVOAR 1 ================= -->
                                          <div class="table-responsive pompa-table" id="pompa11" style="display:none;">
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
                                                          <td><input type="number" name="pompa[11][frekuensi]" class="form-control form-control-sm text-center" step="any" value="40.7" placeholder="contoh: 40.7"></td>
                                                          <td><input type="number" name="pompa[11][ampere]"   class="form-control form-control-sm text-center" step="any" value="6.7" placeholder="contoh: 40.7"></td>
                                                          <td><input type="number" name="pompa[11][volt]"     class="form-control form-control-sm text-center" step="any" value="220.7" placeholder="contoh: 40.7"></td>
                                                          <td><input type="number" value="90" name="pompa[11][durasi]"   class="form-control form-control-sm text-center"></td>
                                                      </tr>
                                                  </tbody>
                                              </table>
                                          </div>

                                          <!-- ================= TABLE POMPA 4 RESERVOAR 1 ================= -->
                                          <div class="table-responsive pompa-table" id="pompa12" style="display:none;">
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
                                                          <td><input type="number" name="pompa[12][frekuensi]" class="form-control form-control-sm text-center" step="any" value="40.8" placeholder="contoh: 40.7"></td>
                                                          <td><input type="number" name="pompa[12][ampere]"   class="form-control form-control-sm text-center" step="any" value="6.8" placeholder="contoh: 40.7"></td>
                                                          <td><input type="number" value="220.8" name="pompa[12][volt]"     class="form-control form-control-sm text-center" step="any" value="220." placeholder="contoh: 40.7"></td>
                                                          <td><input type="number" value="90" name="pompa[12][durasi]"   class="form-control form-control-sm text-center"></td>
                                                      </tr>
                                                  </tbody>
                                              </table>
                                          </div>

                                           <div class="table-responsive" id="">
                                              <table class="table table-bordered table-striped table-sm">
                                                  <thead class="thead-dark text-center">
                                                      <tr>
                                                          <th>JALUR</th>
                                                          <th>FLOW/DEBIT</th>
                                                          <th>TOTALIZER</th>
                                                          <th>MANOMETER</th>
                                                          
                                                      </tr>
                                                  </thead>
                                                  <tbody>
                                                      <tr>
                                                          <input type="hidden" value="3" name="id_flow[1]">
                                                           <td>1 ACP</td>
                                                          <td><input type="number" name="flow[3]"   class="form-control form-control-sm text-center" step="any" value="150.2" placeholder="contoh: 40.7"></td>
                                                          <td><input type="number" value="98765443" name="total[3]"     class="form-control form-control-sm text-center"></td>
                                                          <input type="hidden" value="1" name="id_mano[1]">
                                                          <td><input type="number" value="3.10" name="mano[1]" class="form-control form-control-sm text-center"></td>
                                                      </tr>
                                                      <tr>
                                                          <input type="hidden" value="4" name="id_flow[2]">
                                                           <td>2 GRP</td>
                                                          <td><input type="number" name="flow[4]"   class="form-control form-control-sm text-center" step="any" value="150.2" placeholder="contoh: 40.7"></td>
                                                          <td><input type="number" value="98765443" name="total[4]"     class="form-control form-control-sm text-center"></td>
                                                          <input type="hidden" value="2" name="id_mano[2]">
                                                          <td><input type="number" value="3.20" name="mano[2]" class="form-control form-control-sm text-center"></td>
                                                      </tr>
                                                  </tbody>
                                              </table>
                                              <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Level Reservoar</span>
                                                </div>
                                                <input type="hidden" value="1" name="id_resv[1]">
                                                <input name="resv[1]" type="number" step="any" value="5.2" class="form-control" placeholder="Username">
                                            </div>
                                          </div>
                                        </div>
                                </fieldset>
                            </div>

                            <div class="col-lg-4 col-md-6 mb-3">
                                       <fieldset class="border border-warning rounded">
                                            <legend class="ml-2 w-auto px-3 border border-warning rounded"><h6>RESERVOAR 2</h6></legend>
                                            <div class="container">
                                    

                                          <!-- ================= PILIH POMPA RESERVOAR 2 ================= -->
                                          <div class="form-group">
                                              <label>Pilih Pompa</label><br>

                                              <!-- Pompa 1 RESERVOAR 2 -->
                                              <div class="form-check form-check-inline">
                                                  <input type="hidden" name="pompa[13][id_pompa]" value="9">
                                                  <input type="hidden" name="pompa[13][status]" value="0">

                                                  <input class="form-check-input cek-pompa"
                                                        type="checkbox"
                                                        id="cek_pompa13"
                                                        data-target="pompa13"
                                                        name="pompa[13][status]"
                                                        value="1">

                                                  <label class="form-check-label" for="cek_pompa13">Pompa 1</label>
                                              </div>

                                              <!-- Pompa 2 RESERVAOR 2 -->
                                              <div class="form-check form-check-inline">
                                                  <input type="hidden" name="pompa[14][id_pompa]" value="14">
                                                  <input type="hidden" name="pompa[14][status]" value="0">

                                                  <input class="form-check-input cek-pompa"
                                                        type="checkbox"
                                                        id="cek_pompa14"
                                                        data-target="pompa14"
                                                        name="pompa[14][status]"
                                                        value="1">

                                                  <label class="form-check-label" for="cek_pompa14">Pompa 2</label>
                                              </div>

                                              <!-- Pompa 3 RESERVAOR 2 -->
                                              <div class="form-check form-check-inline">
                                                  <input type="hidden" name="pompa[15][id_pompa]" value="15">
                                                  <input type="hidden" name="pompa[15][status]" value="0">

                                                  <input class="form-check-input cek-pompa"
                                                        type="checkbox"
                                                        id="cek_pompa15"
                                                        data-target="pompa15"
                                                        name="pompa[15][status]"
                                                        value="1">

                                                  <label class="form-check-label" for="cek_pompa15">Pompa 3</label>
                                              </div>

                                              <!-- Pompa 4 RESERVAOR 2 -->
                                              <div class="form-check form-check-inline">
                                                  <input type="hidden" name="pompa[16][id_pompa]" value="16">
                                                  <input type="hidden" name="pompa[16][status]" value="0">

                                                  <input class="form-check-input cek-pompa"
                                                        type="checkbox"
                                                        id="cek_pompa16"
                                                        data-target="pompa16"
                                                        name="pompa[16][status]"
                                                        value="1">

                                                  <label class="form-check-label" for="cek_pompa16">Pompa 4</label>
                                              </div>
                                              <!-- Pompa 5 RESERVAOR 2 -->
                                              <div class="form-check form-check-inline">
                                                  <input type="hidden" name="pompa[17][id_pompa]" value="17">
                                                  <input type="hidden" name="pompa[17][status]" value="0">

                                                  <input class="form-check-input cek-pompa"
                                                        type="checkbox"
                                                        id="cek_pompa17"
                                                        data-target="pompa17"
                                                        name="pompa[17][status]"
                                                        value="1">

                                                  <label class="form-check-label" for="cek_pompa17">Pompa 5</label>
                                              </div>
                                              <!-- Pompa 6 RESERVAOR 2 -->
                                              <div class="form-check form-check-inline">
                                                  <input type="hidden" name="pompa[18][id_pompa]" value="18">
                                                  <input type="hidden" name="pompa[18][status]" value="0">

                                                  <input class="form-check-input cek-pompa"
                                                        type="checkbox"
                                                        id="cek_pompa18"
                                                        data-target="pompa18"
                                                        name="pompa[18][status]"
                                                        value="1">

                                                  <label class="form-check-label" for="cek_pompa18">Pompa 6</label>
                                              </div>
                                          </div>

                                          <!-- ================= TABLE POMPA 1 RESERVOAR 2 ================= -->
                                          <div class="table-responsive pompa-table" id="pompa13" style="display:none;">
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
                                                          <td><input type="number" name="pompa[13][frekuensi]" class="form-control form-control-sm text-center" step="any" value="40.5" placeholder="contoh: 40.7"></td>
                                                          <td><input type="number" name="pompa[13][ampere]"   class="form-control form-control-sm text-center" step="any" value="6.5" placeholder="contoh: 40.7"></td>
                                                          <td><input type="number" name="pompa[13][volt]"     class="form-control form-control-sm text-center" step="any" value="220.5" placeholder="contoh: 40.7"></td>
                                                          <td><input type="number" value="40" name="pompa[13][durasi]"   class="form-control form-control-sm text-center"></td>
                                                      </tr>
                                                  </tbody>
                                              </table>
                                          </div>

                                          <!-- ================= TABLE POMPA 2 RESERVOAR 2 ================= -->
                                          <div class="table-responsive pompa-table" id="pompa14" style="display:none;">
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
                                                          <td><input type="number" name="pompa[14][frekuensi]" class="form-control form-control-sm text-center" step="any" value="40.6" placeholder="contoh: 40.7"></td>
                                                          <td><input type="number" name="pompa[14][ampere]"   class="form-control form-control-sm text-center" step="any" value="6.6" placeholder="contoh: 40.7"></td>
                                                          <td><input type="number" value="220.6" name="pompa[14][volt]"     class="form-control form-control-sm text-center" step="any" value="220" placeholder="contoh: 40.7"></td>
                                                          <td><input type="number" value="34" name="pompa[14][durasi]"   class="form-control form-control-sm text-center"></td>
                                                      </tr>
                                                  </tbody>
                                              </table>
                                          </div>

                                          <!-- ================= TABLE POMPA 3 RESEVOAR 2 ================= -->
                                          <div class="table-responsive pompa-table" id="pompa15" style="display:none;">
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
                                                          <td><input type="number" name="pompa[15][frekuensi]" class="form-control form-control-sm text-center" step="any" value="40.7" placeholder="contoh: 40.7"></td>
                                                          <td><input type="number" name="pompa[15][ampere]"   class="form-control form-control-sm text-center" step="any" value="6.7" placeholder="contoh: 40.7"></td>
                                                          <td><input type="number" name="pompa[15][volt]"     class="form-control form-control-sm text-center" step="any" value="220.7" placeholder="contoh: 40.7"></td>
                                                          <td><input type="number" value="90" name="pompa[15][durasi]"   class="form-control form-control-sm text-center"></td>
                                                      </tr>
                                                  </tbody>
                                              </table>
                                          </div>

                                          <!-- ================= TABLE POMPA 4 RESERVOAR 2 ================= -->
                                          <div class="table-responsive pompa-table" id="pompa16" style="display:none;">
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
                                                          <td><input type="number" name="pompa[16][frekuensi]" class="form-control form-control-sm text-center" step="any" value="40.8" placeholder="contoh: 40.7"></td>
                                                          <td><input type="number" name="pompa[16][ampere]"   class="form-control form-control-sm text-center" step="any" value="6.8" placeholder="contoh: 40.7"></td>
                                                          <td><input type="number" value="220.8" name="pompa[16][volt]"     class="form-control form-control-sm text-center" step="any" value="220." placeholder="contoh: 40.7"></td>
                                                          <td><input type="number" value="90" name="pompa[16][durasi]"   class="form-control form-control-sm text-center"></td>
                                                      </tr>
                                                  </tbody>
                                              </table>
                                          </div>
                                          <!-- ================= TABLE POMPA 5 RESERVOAR 2 ================= -->
                                          <div class="table-responsive pompa-table" id="pompa17" style="display:none;">
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
                                                          <td class="text-center">5</td>
                                                          <td><input type="number" name="pompa[17][frekuensi]" class="form-control form-control-sm text-center" step="any" value="40.8" placeholder="contoh: 40.7"></td>
                                                          <td><input type="number" name="pompa[17][ampere]"   class="form-control form-control-sm text-center" step="any" value="6.8" placeholder="contoh: 40.7"></td>
                                                          <td><input type="number" value="220.8" name="pompa[17][volt]"     class="form-control form-control-sm text-center" step="any" value="220." placeholder="contoh: 40.7"></td>
                                                          <td><input type="number" value="90" name="pompa[17][durasi]"   class="form-control form-control-sm text-center"></td>
                                                      </tr>
                                                  </tbody>
                                              </table>
                                          </div>
                                          <!-- ================= TABLE POMPA 6 RESERVOAR 2 ================= -->
                                          <div class="table-responsive pompa-table" id="pompa18" style="display:none;">
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
                                                          <td class="text-center">6</td>
                                                          <td><input type="number" name="pompa[18][frekuensi]" class="form-control form-control-sm text-center" step="any" value="40.8" placeholder="contoh: 40.7"></td>
                                                          <td><input type="number" name="pompa[18][ampere]"   class="form-control form-control-sm text-center" step="any" value="6.8" placeholder="contoh: 40.7"></td>
                                                          <td><input type="number" value="220.8" name="pompa[18][volt]"     class="form-control form-control-sm text-center" step="any" value="220." placeholder="contoh: 40.7"></td>
                                                          <td><input type="number" value="90" name="pompa[18][durasi]"   class="form-control form-control-sm text-center"></td>
                                                      </tr>
                                                  </tbody>
                                              </table>
                                          </div>

                                           <div class="table-responsive" id="">
                                              <table class="table table-bordered table-striped table-sm">
                                                  <thead class="thead-dark text-center">
                                                      <tr>
                                                          <th>JALUR</th>
                                                          <th>FLOW/DEBIT</th>
                                                          <th>TOTALIZER</th>
                                                          <th>MANOMETER</th>
                                                          
                                                      </tr>
                                                  </thead>
                                                  <tbody>
                                                      <tr>
                                                          <input type="hidden" value="5" name="id_flow[3]">
                                                           <td>1 KOREM</td>
                                                          <td><input type="number" name="flow[5]"   class="form-control form-control-sm text-center" step="any" value="150.2" placeholder="contoh: 40.7"></td>
                                                          <td><input type="number" value="98765443" name="total[5]"     class="form-control form-control-sm text-center"></td>
                                                          <input type="hidden" value="3" name="id_mano[3]">
                                                          <td><input type="number" value="3.10" name="mano[3]" class="form-control form-control-sm text-center"></td>
                                                      </tr>
                                                      <tr>
                                                          <input type="hidden" value="6" name="id_flow[4]">
                                                           <td>2 AWS</td>
                                                          <td><input type="number" name="flow[6]"   class="form-control form-control-sm text-center" step="any" value="150.2" placeholder="contoh: 40.7"></td>
                                                          <td><input type="number" value="98765443" name="total[6]"     class="form-control form-control-sm text-center"></td>
                                                          <input type="hidden" value="4" name="id_mano[4]">
                                                          <td><input type="number" value="3.20" name="mano[4]" class="form-control form-control-sm text-center"></td>
                                                      </tr>
                                                      <tr>
                                                          <input type="hidden" value="7" name="id_flow[5]">
                                                           <td>3 K.GADING</td>
                                                          <td><input type="number" name="flow[7]"   class="form-control form-control-sm text-center" step="any" value="150.2" placeholder="contoh: 40.7"></td>
                                                          <td><input type="number" value="98765443" name="total[7]"     class="form-control form-control-sm text-center"></td>
                                                          <input type="hidden" value="5" name="id_mano[5]">
                                                          <td><input type="number" value="3.20" name="mano[5]" class="form-control form-control-sm text-center"></td>
                                                      </tr>
                                                  </tbody>
                                              </table>
                                              <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Level Reservoar</span>
                                                </div>
                                                <input type="hidden" value="2" name="id_resv[2]">
                                                <input name="resv[2]" type="number" step="any" value="5.2" class="form-control" placeholder="Username">
                                            </div>
                                          </div>
                                        </div>
                                </fieldset>
                            </div>
                            <div class="col-lg-4 col-md-6 mb-3">
                                       <fieldset class="border border-warning rounded">
                                            <legend class="ml-2 w-auto px-3 border border-warning rounded"><h6>RESERVOAR 3(SEGIRI)</h6></legend>
                                            <div class="container">
                                    

                                          <!-- ================= PILIH POMPA RESERVOAR 3 SEGIRI ================= -->
                                          <div class="form-group">
                                              <label>Pilih Pompa</label><br>

                                              <!-- Pompa 1 RESERVOAR 2 -->
                                              <div class="form-check form-check-inline">
                                                  <input type="hidden" name="pompa[19][id_pompa]" value="19">
                                                  <input type="hidden" name="pompa[19][status]" value="0">

                                                  <input class="form-check-input cek-pompa"
                                                        type="checkbox"
                                                        id="cek_pompa19"
                                                        data-target="pompa19"
                                                        name="pompa[19][status]"
                                                        value="1">

                                                  <label class="form-check-label" for="cek_pompa19">Pompa 1</label>
                                              </div>

                                              <!-- Pompa 2 RESERVAOR 1 -->
                                              <div class="form-check form-check-inline">
                                                  <input type="hidden" name="pompa[20][id_pompa]" value="20">
                                                  <input type="hidden" name="pompa[20][status]" value="0">

                                                  <input class="form-check-input cek-pompa"
                                                        type="checkbox"
                                                        id="cek_pompa20"
                                                        data-target="pompa20"
                                                        name="pompa[20][status]"
                                                        value="1">

                                                  <label class="form-check-label" for="cek_pompa20">Pompa 2</label>
                                              </div>

                                              <!-- Pompa 3 RESERVAOR 1 -->
                                              <div class="form-check form-check-inline">
                                                  <input type="hidden" name="pompa[21][id_pompa]" value="21">
                                                  <input type="hidden" name="pompa[21][status]" value="0">

                                                  <input class="form-check-input cek-pompa"
                                                        type="checkbox"
                                                        id="cek_pompa21"
                                                        data-target="pompa21"
                                                        name="pompa[21][status]"
                                                        value="1">

                                                  <label class="form-check-label" for="cek_pompa21">Pompa 3</label>
                                              </div>

                                              
                                          </div>

                                          <!-- ================= TABLE POMPA 1 RESERVOAR 1 ================= -->
                                          <div class="table-responsive pompa-table" id="pompa19" style="display:none;">
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
                                                          <td><input type="number" name="pompa[19][frekuensi]" class="form-control form-control-sm text-center" step="any" value="40.5" placeholder="contoh: 40.7"></td>
                                                          <td><input type="number" name="pompa[19][ampere]"   class="form-control form-control-sm text-center" step="any" value="6.5" placeholder="contoh: 40.7"></td>
                                                          <td><input type="number" name="pompa[19][volt]"     class="form-control form-control-sm text-center" step="any" value="220.5" placeholder="contoh: 40.7"></td>
                                                          <td><input type="number" value="40" name="pompa[19][durasi]"   class="form-control form-control-sm text-center"></td>
                                                      </tr>
                                                  </tbody>
                                              </table>
                                          </div>

                                          <!-- ================= TABLE POMPA 2 RESERVOAR 1 ================= -->
                                          <div class="table-responsive pompa-table" id="pompa20" style="display:none;">
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
                                                          <td><input type="number" name="pompa[20][frekuensi]" class="form-control form-control-sm text-center" step="any" value="40.6" placeholder="contoh: 40.7"></td>
                                                          <td><input type="number" name="pompa[20][ampere]"   class="form-control form-control-sm text-center" step="any" value="6.6" placeholder="contoh: 40.7"></td>
                                                          <td><input type="number" value="220.6" name="pompa[20][volt]"     class="form-control form-control-sm text-center" step="any" value="220" placeholder="contoh: 40.7"></td>
                                                          <td><input type="number" value="34" name="pompa[20][durasi]"   class="form-control form-control-sm text-center"></td>
                                                      </tr>
                                                  </tbody>
                                              </table>
                                          </div>

                                          <!-- ================= TABLE POMPA 3 RESEVOAR 1 ================= -->
                                          <div class="table-responsive pompa-table" id="pompa21" style="display:none;">
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
                                                          <td><input type="number" name="pompa[21][frekuensi]" class="form-control form-control-sm text-center" step="any" value="40.7" placeholder="contoh: 40.7"></td>
                                                          <td><input type="number" name="pompa[21][ampere]"   class="form-control form-control-sm text-center" step="any" value="6.7" placeholder="contoh: 40.7"></td>
                                                          <td><input type="number" name="pompa[21][volt]"     class="form-control form-control-sm text-center" step="any" value="220.7" placeholder="contoh: 40.7"></td>
                                                          <td><input type="number" value="90" name="pompa[21][durasi]"   class="form-control form-control-sm text-center"></td>
                                                      </tr>
                                                  </tbody>
                                              </table>
                                          </div>

                                          

                                           <div class="table-responsive" id="">
                                              <table class="table table-bordered table-striped table-sm">
                                                  <thead class="thead-dark text-center">
                                                      <tr>
                                                          <th>JALUR</th>
                                                          <th>FLOW/DEBIT</th>
                                                          <th>TOTALIZER</th>
                                                          <th>MANOMETER</th>
                                                          
                                                      </tr>
                                                  </thead>
                                                  <tbody>
                                                      <tr>
                                                          <input type="hidden" value="8" name="id_flow[6]">
                                                           <td>1 SEGIRI</td>
                                                          <td><input type="number" name="flow[3]"   class="form-control form-control-sm text-center" step="any" value="150.2" placeholder="contoh: 40.7"></td>
                                                          <td><input type="number" value="98765443" name="total[3]"     class="form-control form-control-sm text-center"></td>
                                                          <input type="hidden" value="6" name="id_mano[6]">
                                                          <td><input type="number" value="3.10" name="mano[6]" class="form-control form-control-sm text-center"></td>
                                                      </tr>
                                                      
                                                  </tbody>
                                              </table>
                                              <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Level Reservoar</span>
                                                </div>
                                                <input type="hidden" value="1" name="id_resv[3]">
                                                <input name="resv[3]" type="number" step="any" value="5.2" class="form-control" placeholder="Username">
                                            </div>
                                          </div>
                                        </div>
                                </fieldset>
                                
                            </div>
                            
                        </div>
                        <fieldset class="border border-warning rounded">
                                    <legend class="ml-2 w-auto px-3 border border-warning rounded"><h6>OPERASIONAL IPA</h6></legend>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col">
                                                <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Buang Lumpur</span>
                                                </div>
                                                
                                                <input name="resv[3]" type="number" step="any" value="5.2" class="form-control" placeholder="Username">
                                            </div>
                                            
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <select class="form-control">
                                                    <option>option 1</option>
                                                    <option>option 2</option>
                                                    <option>option 3</option>
                                                    <option>option 4</option>
                                                    <option>option 5</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Cuci Filter</span>
                                                </div>
                                                
                                                <input name="resv[3]" type="number" step="any" value="5.2" class="form-control" placeholder="Username">
                                            </div>
                                            
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <select class="form-control">
                                                    <option>option 1</option>
                                                    <option>option 2</option>
                                                    <option>option 3</option>
                                                    <option>option 4</option>
                                                    <option>option 5</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
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
      <!-- /.modal -->
      @include('sweetalert::alert')

@endsection
