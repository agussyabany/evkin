@extends('layouts.main')

@section('title')
  SETTING | USERs
@endsection

@section('content')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <h1 class="m-0 text-center">PENGGUNA</h1>
  </div>
  <!-- /.content-header -->
  <div class="content">
    <div class="float-right">
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_pelayanan" id="tambah_pelayanan">Tambah Data</button>
    </div>
  <br><br>

  <fieldset class="border border-primary rounded">
    
    <legend class="ml-2 w-auto px-3 border border-primary rounded">DATA PENGGUNA</legend>
    <div class="content">
    <table class="table table-striped responsive" id="tbl">
      <thead>
          <tr>
              <th>NO</th>
              <th>Nama</th>
              <th>Email</th>
              <th>Role</th>
              <th>Aksi</th>
              
              
          </tr>
      </thead>
      <tbody>
     @foreach($users as $user)
        <tr>
          
          <td>{{ $loop->iteration }}</td>
          <td>{{ $user->name }}</td>
          <td>{{ $user->email }}</td>
          <td>{{ $user->roles->pluck('name')->implode(', ') }}</td>
          <td>
          <div class="btn-group">
                        <button type="button" class="btn btn-default">Action</button>
                        <button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown" aria-expanded="false">
                          <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <div class="dropdown-menu" role="menu" style="">
                          <a class="dropdown-item" href="#" data-id="" id="edit_pelayanan">Edit</a>
                          <form action="" method="POST" style="display:inline;">
                            @csrf
                            
                            <a class="dropdown-item" href="#" onclick="event.preventDefault(); 
                                if (confirm('Apakah  yakin ingin menghapus data  {{ \Carbon\Carbon::parse()->translatedFormat('F Y') }} ?')) {  
                                    this.closest('form').submit(); 
                                }">Hapus</a>
                        </form>
                        <form action="/verPel/" method="POST" style="display:inline;">
                          @csrf
                          
                          <a class="dropdown-item" href="#" onclick="event.preventDefault(); 
                              if (confirm('Apakah  yakin ingin memverivikasi data  {{ \Carbon\Carbon::parse()->translatedFormat('F Y') }} ?')) {  
                                  this.closest('form').submit(); 
                              }">Verifikasi</a>
                      </form>
                        </div>
                      </div>
          </td>
        </tr>
        @endforeach
        
      </tbody>
  </table>
</div>
  </fieldset>
  </div>
</div>

  
{{-- MODAL --}}
<div class="modal fade" id="modal_pelayanan">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"  id="judul_pelayanan">Input Data User</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">


              <form action="/save" method="POST">
                @csrf
                <input required type="hidden" id="idPel" name="idPel" class="form-control">
              <fieldset class="border border-primary rounded">
                <legend class="ml-2 w-auto px-3 border border-primary rounded"><h6>-</h6></legend>
                  
                <div class="container">
                    <div class="row">
                      <div class="col form-group">
                        <label >Nama</label>
                        <input required type="text" class="form-control" name="name" >
                         <label>NIPP</label>
                        <input required type="text" class="form-control" name="nipp" >
                        <label>Jabatan</label>
                        <select name="jabatan" class="form-control" required>
                                <option value="1">Staf</option>
                                <option value="2">Asisten Manajer</option>
                                <option value="2">Manajer</option>
                        </select>
                        <label>Penempatan</label>
                         <select name="ipa" class="form-control" required>
                            @foreach($ipa as $ipas)
                                <option value="{{ $ipas->id }}">{{ $ipas->nama_ipa }}</option>
                            @endforeach
                        </select>
                        
                      </div>

                      <div class="col form-group">
                        <label >eMail</label>
                        <input required type="email" class="form-control" name="email" >
                        <label >Password</label>
                        <input required type="text" class="form-control" name="password">
                         <label>Role</label>
                          <select name="role" class="form-control" required>
                            @foreach($roles as $role)
                                <option value="{{ $role->name }}">{{ strtoupper($role->name) }}</option>
                            @endforeach
                        </select>
                      </div>
                    </div>
                  </div>
                </fieldset><br>

                <fieldset class="border border-success rounded">
                <legend class="ml-2 w-auto px-3 border border-success rounded"><h6>-</h6></legend>
                  
                <div class="container">
                    <div class="row">
                      <div class="col form-group">
                        
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


@include('sweetalert::alert')
@endsection
