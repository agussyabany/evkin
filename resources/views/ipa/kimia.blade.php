@extends('layouts.main')

@section('title')
  EVKIN | DASHBAORAD
@endsection

@section('content')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <h1 class="m-0 text-center">STOK GUDANG CENDANA</h1>
  </div>
  <!-- /.content-header -->
  <div class="content">
    {{-- <div class="float-right">
      @if (Auth::user()->hasAnyRole(['ipa','agus']))
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_ipa" id="tambah_ipa">TAMBAH</button>
      @endif
    </div> --}}
  <br><br>

 {{-- ===================== TABEL STOK IPA ===================== --}}
<div class="card mb-4">
    <div class="card-header bg-dark text-white">
        <strong>Stok Bahan Kimia IPA</strong>
    </div>

    <div class="card-body table-responsive">
        <table class="table table-bordered table-sm">
            <thead class="text-center">
                <tr>
                    <th>No</th>
                    <th>Bahan</th>
                    <th>Stok</th>
                    <th>Satuan</th>
                    <th>Total Kg</th>
                    @role(['agus','ipa'])
                          @if(Auth::user()->jabatan == 1)
                    <th>Tambah</th>
                    @endif
                    @endrole
                </tr>
            </thead>
            <tbody>
                @foreach($stok as $item)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td>{{ $item->bahan->nama_bahan }}</td>
                    <td class="text-center">{{ $item->stok }}</td>
                    <td class="text-center">{{ $item->bahan->satuan->nama_satuan }}</td>
                    <td class="text-center">
                        {{ $item->stok * $item->bahan->ukuran }}
                    </td>
                     @role(['agus','ipa'])
                          @if(Auth::user()->jabatan == 2)
                            <td class="text-center">
                                <button class="btn btn-outline-success btn-sm btn-add"
                                    data-id="{{ $item->bahan->id }}"
                                    data-nama="{{ $item->bahan->nama_bahan }}"
                                    data-satuan="{{ $item->bahan->satuan->nama_satuan }}"
                                    data-ukuran="{{ $item->bahan->ukuran }}"
                                    data-stok="{{ $item->stok }}">
                                    <i class="fa fa-plus"></i>
                                </button>
                            </td>
                            @endif
                    @endrole
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

{{-- ===================== KERANJANG PERMINTAAN ===================== --}}
<div class="card">
  <div class="container">
    <div class="card mt-4 d-none" id="cart-header">
    <div class="card-header bg-info text-white">
        <strong>Keranjang Permintaan Bahan</strong>
        <div class="small mt-1">
            No Permintaan :
            <span id="no-permintaan">-</span><br>

            IPA :
            <span id="nama-ipa">{{ auth()->user()->ipaRelasi->nama_ipa}}</span><br>

            Peminta :
            <span id="nama-user">{{ auth()->user()->name }}</span>
        </div>
    </div>

    <div class="card-body table-responsive">
        <table class="table table-bordered table-sm" id="cart-table">
            <thead class="text-center">
                <tr>
                    <th>No</th>
                    <th>Bahan</th>
                    <th width="120">Jumlah</th>
                    <th>Satuan</th>
                    <th>Kilogram</th>
                    <th width="60">Hapus</th>
                </tr>
            </thead>
            <tbody id="cart-body">
                <tr id="cart-empty">
                    <td colspan="6" class="text-center text-muted">
                        Belum ada bahan dipilih
                    </td>
                </tr>
            </tbody>
        </table><br>
        <div class="float-right">
          <button class="btn btn-outline-info" id="btn-kirim">KIRIM</button>
        </div>
    </div>
</div>
  </div>
  
</div>
</div>

    

@if($permintaan && $permintaan->status === 'draft')
<script>
    window.PERMINTAAN_DRAFT_ID = {{ $permintaan->id }};
</script>
@endif
      <!-- /.modal -->
      <!-- /.modal -->
      @include('sweetalert::alert')
</div>
@endsection
