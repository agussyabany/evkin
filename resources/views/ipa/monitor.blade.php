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
        <div class="modal-dialog modal-xl">
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
                                                          <th>NTU</th>
                                                          <th>FLOW/DEBIT</th>
                                                          <th>TOTALIZER</th>
                                                          
                                                      </tr>
                                                  </thead>
                                                  <tbody>
                                                      <tr>
                                                         <input type="hidden" value="1" name="id_intake[1]">
                                                          <td><input type="number" name="ntu[1]" class="form-control form-control-sm text-center" step="any" value="100.1" placeholder="contoh: 40.7"></td>
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
                                                          <th>NTU</th>
                                                          <th>FLOW/DEBIT</th>
                                                          <th>TOTALIZER</th>
                                                          
                                                      </tr>
                                                  </thead>
                                                  <tbody>
                                                      <tr>
                                                          <input type="hidden" value="2" name="id_intake[2]">
                                                          <td><input type="number" name="ntu[2]" class="form-control form-control-sm text-center" step="any" value="100.8" placeholder="contoh: 40.7"></td>
                                                          <td><input type="number" name="flow[2]"   class="form-control form-control-sm text-center" step="any" value="150.2" placeholder="contoh: 40.7"></td>
                                                          <td><input type="number" value="98765443" name="total[2]"     class="form-control form-control-sm text-center"></td>
                                                      </tr>
                                                  </tbody>
                                              </table>
                                          </div>

                                    
                                  </div>
                                </fieldset>
                              </div>
                            </div>
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
