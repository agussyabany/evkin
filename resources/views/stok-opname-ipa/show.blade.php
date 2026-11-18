
@extends('layouts.main')

@section('title', 'Detail Stok Opname IPA')

@section('content')
<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <h1>Detail Stok Opname IPA</h1>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">

            <div class="card card-secondary">

                <div class="card-header">
                    <h3 class="card-title">
                        Informasi Opname
                    </h3>

                    <div class="card-tools">
                         <a href="{{ route('stok-opname-ipa.print', $opname->id) }}"
                            target="_blank"
                            class="btn btn-sm btn-danger">
                                <i class="fas fa-print"></i>
                                Cetak / Simpan PDF
                         </a>
                         
                        <a href="{{ route('stok-opname-ipa.index') }}"
                           class="btn btn-sm btn-secondary">
                            <i class="fas fa-arrow-left"></i>
                            Kembali
                        </a>

                    </div>
                </div>

                <div class="card-body">

                    <div class="row">

                        <div class="col-md-4">
                            <strong>No. Opname</strong>
                            <p>{{ $opname->no_opname }}</p>
                        </div>

                        <div class="col-md-4">
                            <strong>Periode</strong>
                            <p>
                                {{ \Carbon\Carbon::parse($opname->periode)->translatedFormat('F Y') }}
                            </p>
                        </div>

                        <div class="col-md-4">
                            <strong>Tanggal Opname</strong>
                            <p>
                                {{ \Carbon\Carbon::parse($opname->tanggal_opname)->format('d/m/Y H:i') }}
                            </p>
                        </div>

                        <div class="col-md-4">
                            <strong>Petugas</strong>
                            <p>{{ $opname->nama_petugas ?? '-' }}</p>
                        </div>

                        <div class="col-md-4">
                            <strong>IPA</strong>
                            <p>{{ $opname->id_ipa }}</p>
                        </div>

                        <div class="col-md-4">
                            <strong>Status</strong>
                            <p>
                                <span class="badge badge-success">
                                    Posted
                                </span>
                            </p>
                        </div>

                    </div>

                    <hr>

                    <h5>Rincian Stok Bahan Kimia</h5>

                    <div class="table-responsive mt-3">
                        <table class="table table-bordered table-striped">
                            <thead class="bg-primary text-center">
                                <tr>
                                    <th width="5%">No</th>
                                    <th>Nama Bahan</th>
                                    <th>Stok Sistem</th>
                                    <th>Stok Fisik</th>
                                    <th>Selisih</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse($detail as $i => $item)
                                    <tr>
                                        <td class="text-center">
                                            {{ $i + 1 }}
                                        </td>

                                        <td>
                                            {{ $item->nama_bahan }}
                                        </td>

                                        <td class="text-right">
                                            {{ number_format($item->stok_sistem, 2, ',', '.') }}
                                        </td>

                                        <td class="text-right">
                                            {{ number_format($item->stok_fisik, 2, ',', '.') }}
                                        </td>

                                        <td class="text-right
                                            {{ $item->selisih < 0 ? 'text-danger' : ($item->selisih > 0 ? 'text-success' : '') }}">
                                            {{ number_format($item->selisih, 2, ',', '.') }}
                                        </td>

                                        <td>
                                            {{ $item->keterangan ?? '-' }}
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">
                                            Tidak ada detail opname.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <hr>

                    <strong>Catatan Opname:</strong>
                    <p>{{ $opname->catatan ?? '-' }}</p>

                </div>
            </div>

        </div>
    </section>
</div>
@endsection
