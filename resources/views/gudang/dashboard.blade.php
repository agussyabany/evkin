@extends('layouts.app')

@section('title', 'Dashboard Gudang Utama')

@section('content')
<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <h1>Dashboard Gudang Utama</h1>
            <p class="text-muted">
                Ringkasan persediaan dan permintaan bahan kimia
            </p>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">

            <div class="row">

                <div class="col-lg-3 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $totalJenisBahan }}</h3>
                            <p>Jenis Bahan di Gudang</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-boxes"></i>
                        </div>
                        <a href="{{ url('/stokGudang') }}"
                           class="small-box-footer">
                            Lihat Persediaan
                            <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{ $totalPermintaan }}</h3>
                            <p>Total Permintaan</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-clipboard-list"></i>
                        </div>
                        <a href="{{ url('/dataMinta') }}"
                           class="small-box-footer">
                            Lihat Permintaan
                            <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{ $permintaanStatus0 }}</h3>
                            <p>Permintaan Status 0</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-hourglass-half"></i>
                        </div>
                        <a href="{{ url('/dataMinta') }}"
                           class="small-box-footer">
                            Periksa Permintaan
                            <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{ $permintaanDiterima }}</h3>
                            <p>Permintaan Diterima IPA</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-check-circle"></i>
                        </div>
                        <a href="{{ url('/dataMinta') }}"
                           class="small-box-footer">
                            Lihat Riwayat
                            <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>

            </div>

            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-history mr-1"></i>
                        Permintaan Bahan Kimia Terbaru
                    </h3>
                    <div class="card-tools">
                        <a href="{{ url('/dataMinta') }}"
                           class="btn btn-sm btn-primary">
                            Semua Permintaan
                        </a>
                    </div>
                </div>

                <div class="card-body table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>No. Permintaan</th>
                                <th>IPA</th>
                                <th>Tanggal</th>
                                <th>Status</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($permintaanTerbaru as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        {{ $item->no_permintaan }}
                                    </td>
                                    <td>
                                        {{ $item->ipa->nama_ipa
                                            ?? $item->ipa->nama
                                            ?? 'IPA tidak diketahui' }}
                                    </td>
                                    <td>
                                        {{ $item->created_at
                                            ? $item->created_at->format('d-m-Y H:i')
                                            : '-' }}
                                    </td>
                                    <td>
                                        @if ((int) $item->status === 5)
                                            <span class="badge badge-success">
                                                Diterima IPA
                                            </span>
                                        @elseif ((int) $item->status === 0)
                                            <span class="badge badge-warning">
                                                Status 0
                                            </span>
                                        @else
                                            <span class="badge badge-secondary">
                                                Status {{ $item->status }}
                                            </span>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">
                                        Belum ada data permintaan.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </section>
</div>
@endsection