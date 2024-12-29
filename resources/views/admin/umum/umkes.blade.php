@extends('layouts.main')

@section('title')
  EVKIN | DASHBAORAD
@endsection

@section('content')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <h1 class="m-0 text-center">UMUM DAN KESEKRETARIATAN</h1>
  </div>
  <!-- /.content-header -->
  <div class="content">
    <div class="float-right">
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-umkes" id="tambah_umkes">Tambah Data Keuangan</button>
    </div>
  <br><br>

  <fieldset class="border border-primary rounded">
    <legend class="ml-2 w-auto px-3 border border-primary rounded"><h6>DATA KESELURUHAN</h6></legend>
          <div class="content row">
           
            <div class="col">
              <div class="card">
                <div class="card-header">GUDANG</div>
                <div class="card-body">
                  <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>BAHAN</th>
                            <th>STOK HARI INI</th>
                        </tr>
                    </thead>
                    <tbody id="summary-table-body">
                        <tr>
                            <td>1</td>
                            <td>Bahan Kimia</td>
                            <td>0</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Water Meter</td>
                            <td>0</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>G Bolt</td>
                            <td>0</td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Paket SR</td>
                            <td>0</td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>Clamp Saddle    </td>
                            <td>0</td>
                        </tr>
                    </tbody>
                </table>

                </div>
              </div>
              
          </div>
            
          <div class="col">
            <div class="card">
              <div class="card-header">INFORMASI DAN TEKNOLOGI</div>
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                      <tr>
                          <th>NO</th>
                          <th>KEGIATAN</th>
                          <th>BULAN</th>
                          <th>TAHUN</th>
                      </tr>
                  </thead>
                  <tbody id="summary-table-body">
                    <tr>
                        <td>1</td>
                        <td>Apliksi yang digunkan</td>
                        <td>0</td>
                        <td>0</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Service</td>
                        <td>0</td>
                        <td>0</td>
                    </tr>
                  </tbody>
              </table>

              </div>
            </div>
            
        </div>


        <div class="col">
          <div class="card">
            <div class="card-header">PENGADAAN DAN LPSE</div>
            <div class="card-body">
              <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>KEGIATAN</th>
                        <th>BULAN</th>
                        <th>TAHUN</th>
                    </tr>
                </thead>
                <tbody id="summary-table-body">
                    <tr>
                        <td>1</td>
                        <td>Pembelian Langsung</td>
                        <td>0</td>
                        <td>0</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Pengadaan Langsung</td>
                        <td>0</td>
                        <td>0</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Kontrak</td>
                        <td>0</td>
                        <td>0</td>
                    </tr>
                </tbody>
            </table>

            </div>
          </div>
          
      </div>

      <div class="col">
        <div class="card">
          <div class="card-header">HUKUM</div>
          <div class="card-body">
            <table class="table table-bordered">
              <thead>
                  <tr>
                      <th>NO</th>
                      <th>KEGIATAN</th>
                      <th>BULAN</th>
                      <th>TAHUN</th>
                  </tr>
              </thead>
              <tbody id="summary-table-body">
                  <tr>
                      <td>1</td>
                      <td>Pembuatan Produk Hukum</td>
                      <td>0</td>
                      <td>0</td>
                  </tr>
                  
              </tbody>
          </table>

          </div>
        </div>
        
    </div>

    <div class="col">
        <div class="card">
          <div class="card-header">HUMAS</div>
          <div class="card-body">
            <table class="table table-bordered">
              <thead>
                  <tr>
                      <th>NO</th>
                      <th>KEGIATAN</th>
                      <th>BULAN</th>
                      <th>TAHUN</th>
                  </tr>
              </thead>
              <tbody id="summary-table-body">
                  <tr>
                      <td>1</td>
                      <td>Jumlah Tiket Aduan</td>
                      <td>0</td>
                      <td>0</td>
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
          <div class="card-header">INFORMASI DAN TEKNOLOGI</div>
          <div class="card-body">
            <table class="table table-bordered">
              <thead>
                  <tr>
                      <th>NO</th>
                      <th>Apliksi yang digunkan</th>
                      <th>Service</th>
                      <th>Periode</th>
                  </tr>
              </thead>
              <tbody id="summary-table-body">
                <tr>
                    <td>1</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                </tr>
              </tbody>
          </table>

          </div>
        </div>
        
    </div>
    <div class="col">
        <div class="card">
          <div class="card-header">PENGADAAN DAN LPSE</div>
          <div class="card-body">
            <table class="table table-bordered">
              <thead>
                  <tr>
                      <th>NO</th>
                      <th>Pembelian Langsung</th>
                      <th>Pengadaan Langsung</th>
                      <th>Kontrak</th>
                      <th>Periode</th>
                  </tr>
              </thead>
              <tbody id="summary-table-body">
                <tr>
                    <td>1</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                </tr>
              </tbody>
          </table>

          </div>
        </div>
        
    </div>
    <div class="col">
        <div class="card">
          <div class="card-header">HUKUM</div>
          <div class="card-body">
            <table class="table table-bordered">
              <thead>
                  <tr>
                      <th>NO</th>
                      <th>Pembuatan Produk Hukum</th>
                      <th>Periode</th>
                  </tr>
              </thead>
              <tbody id="summary-table-body">
                <tr>
                    <td>1</td>
                    <td>0</td>
                    <td>0</td>
                </tr>
              </tbody>
          </table>

          </div>
        </div>
        
    </div>

    <div class="col">
        <div class="card">
          <div class="card-header">HUMAS</div>
          <div class="card-body">
            <table class="table table-bordered">
              <thead>
                  <tr>
                      <th>NO</th>
                      <th>Jumlah Tiket Aduan</th>
                      <th>Periode</th>
                  </tr>
              </thead>
              <tbody id="summary-table-body">
                <tr>
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

      <div class="modal fade" id="modal-umkes">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"  id="judul_umkes">UMUM DAN KESEKRETARIATAN</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">


              <form action="/pp" method="POST" id="form-umkes">
                @csrf
                <input required type="hidden" id="" name="" class="form-control">
              <fieldset class="border border-primary rounded">
                <legend class="ml-2 w-auto px-3 border border-primary rounded"><h6>Informasi Dan Teknologi</h6></legend>
                  
                <div class="container">
                    <div class="row">
                      <div class="col form-group">
                        <label >Aplikasi Yang Digunakan</label>
                        <input required type="number" class="form-control" name="aplGuna" id="aplGuna">
                      </div>

                      <div class="col form-group">
                        <label >Service</label>
                        <input required type="number" class="form-control" name="service" id="service">
                      </div>
                    </div>
                  </div>
                </fieldset><br>

                <fieldset class="border border-success rounded">
                <legend class="ml-2 w-auto px-3 border border-success rounded"><h6>Pengadaan Dan LPSE</h6></legend>
                  
                <div class="container">
                    <div class="row">
                      <div class="col form-group">
                        <label>Pembelian Langsung</label>
                        <input required type="number" class="form-control" name="beliLangsung" id="beliLangsung">
                      </div>

                      <div class="col form-group">
                        <label>Pengadaan Langsung</label>
                        <input required type="number" class="form-control" name="adaLangsung" id="adaLangsung">
                      </div>
                      <div class="col form-group">
                        <label>Kontrak</label>
                        <input required type="number" class="form-control" name="kontrak" id="kontrak">
                      </div>
                    </div>
                  </div>
                </fieldset><br>

                <fieldset class="border border-info rounded">
                <legend class="ml-2 w-auto px-3 border border-info rounded" style="display:flex; justify-content:flex-end; align-items:center;"><h6>Hukum</h6></legend>
                  
                <div class="container">
                    <div class="row">
                      <div class="col form-group">
                        <label >Pembuatan Produk Hukum</label>
                        <input required type="number" class="form-control" name="produkHukum" id="produkHukum">
                      </div>

                      <div class="col form-group">
                        
                      </div>
                    </div>
                  </div>
                </fieldset><br>

                <fieldset class="border border-info rounded">
                    <legend class="ml-2 w-auto px-3 border border-info rounded" style="display:flex; justify-content:flex-end; align-items:center;"><h6>Humas</h6></legend>
                      
                    <div class="container">
                        <div class="row">
                          <div class="col form-group">
                            <label >Jumlah Tiket Aduan</label>
                            <input required type="number" class="form-control" name="aduanCC" id="aduanCC">
                          </div>
    
                          <div class="col form-group">
                            
                          </div>
                        </div>
                      </div>
                    </fieldset><br>
                    <fieldset class="border border-info rounded">
                        <legend class="ml-2 w-auto px-3 border border-info rounded" style="display:flex; justify-content:flex-end; align-items:center;"><h6>Periode</h6></legend>
                          
                        <div class="container">
                            <div class="row">
                              <div class="col form-group">
                                <label>Periode</label>
                                <select name="periode" class="form-control" id="periode">
                                  @foreach ($bulan as $month)
                                    <option value="{{ $month }}">{{ $month }}</option>
                                  @endforeach
                                </select>
                                
                              </div>
        
                              <div class="col form-group">
                                
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
