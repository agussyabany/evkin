@extends('layouts.main')

@section('content')
<style>
    .stok-ipa-wrapper {
        width: 100%;
        overflow: auto;
        max-height: 72vh;
    }

    .stok-ipa-table {
        min-width: 1400px;
        white-space: nowrap;
        margin-bottom: 0;
    }

    .stok-ipa-table th,
    .stok-ipa-table td {
        text-align: center;
        vertical-align: middle !important;
        padding: 9px 12px;
    }

    .stok-ipa-table thead th {
        position: sticky;
        top: 0;
        z-index: 3;
        background: #343a40;
    }

    .stok-ipa-table th:first-child,
    .stok-ipa-table td:first-child {
        position: sticky;
        left: 0;
        min-width: 200px;
        max-width: 260px;
        text-align: left;
        z-index: 2;
        background: #343a40;
    }

    .stok-ipa-table thead th:first-child {
        z-index: 5;
    }

    .stok-cell {
        font-weight: 600;
        border-radius: 4px;
    }

    .stok-habis {
        background: #dc3545 !important;
        color: #fff !important;
    }

    .stok-menipis {
        background: #ffc107 !important;
        color: #212529 !important;
    }

    .stok-normal {
        background: #198754 !important;
        color: #fff !important;
    }

    .stok-belum-setting {
        background: #6c757d !important;
        color: #fff !important;
    }

    @media print {
        .main-sidebar,
        .main-header,
        .main-footer,
        .card-tools,
        .no-print {
            display: none !important;
        }

        .content-wrapper {
            margin-left: 0 !important;
        }

        .stok-ipa-wrapper {
            max-height: none;
            overflow: visible;
        }

        .stok-ipa-table {
            min-width: 0;
            font-size: 8px;
        }

        .stok-ipa-table th:first-child,
        .stok-ipa-table td:first-child,
        .stok-ipa-table thead th {
            position: static;
        }
    }
</style>
<div class="content-wrapper">
                <div class="container-fluid">
                    <div class="row">
                <div class="col-md-6 col-xl-3">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $totalJenisBahan }}</h3>
                            <p>Jenis Bahan Kimia</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-flask"></i>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-xl-3">
                    <div class="small-box bg-primary">
                        <div class="inner">
                            <h3>{{ $totalIpa }}</h3>
                            <p>IPA Terpantau</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-building"></i>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-xl-3">
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{ $stokKritis }}</h3>
                            <p>Stok Kritis</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-exclamation-triangle"></i>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-xl-3">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{ $stokHabis }}</h3>
                            <p>Stok Habis</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-box-open"></i>
                        </div>
                    </div>
                </div>
            </div>
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-table mr-2"></i>
                    Laporan Stok Bahan Kimia Seluruh IPA
                </h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-success btn-sm" onclick="window.print()">
                        <i class="fas fa-print"></i> Cetak
                    </button>
                </div>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-sm text-center">
                        <thead>
                            <tr>
                                <th colspan="{{ $ipas->count() + 1 }}" class="text-center bg-light">
                                    LAPORAN STOK BAHAN KIMIA PER IPA
                                </th>
                            </tr>
                            <tr>
                                <th rowspan="2" class="align-middle">
                                    BAHAN KIMIA
                                </th>
                                <th colspan="{{ $ipas->count() }}">
                                    IPA
                                </th>
                            </tr>
                            <tr>
                                @foreach ($ipas as $ipa)
                                    <th>{{ strtoupper($ipa->nama_ipa) }}</th>
                                @endforeach
                            </tr>
                        </thead>

                        <tbody>
                             @forelse ($bahans as $bahan)
        <tr>
            <td>
                <strong>{{ $bahan->nama_bahan }}</strong>
            </td>

            @foreach ($ipas as $ipa)
                @php
                    $key = $bahan->id . '-' . $ipa->id;

                    $adaStok = isset(
                        $stokMatrix[$bahan->id][$ipa->id]
                    );

                    $jumlah = $stokMatrix[$bahan->id][$ipa->id] ?? 0;

                    $setting = $minimumStok->get($key);

                    $minimum = $setting
                        ? (float) $setting->stok_minimum
                        : null;

                    if (!$adaStok && !$setting) {
                        $kelas = 'stok-belum-setting';
                        $status = 'Belum ada data stok';
                    } elseif ($jumlah <= 0) {
                        $kelas = 'stok-habis';
                        $status = 'Stok habis';
                    } elseif ($minimum === null || $minimum <= 0) {
                        $kelas = 'stok-belum-setting';
                        $status = 'Minimum belum diatur';
                    } elseif ($jumlah <= $minimum) {
                        $kelas = 'stok-menipis';
                        $status = 'Stok mencapai batas minimum';
                    } else {
                        $kelas = 'stok-normal';
                        $status = 'Stok normal';
                    }
                @endphp

                <td>
                    <span
                        class="stok-cell {{ $kelas }}"
                        title="{{ $status }}{{ $minimum !== null ? ' | Minimum: ' . $minimum : '' }}"
                    >
                        {{ number_format((float) $jumlah, 2, ',', '.') }}
                    </span>
                </td>
            @endforeach
        </tr>
    @empty
        <tr>
            <td colspan="{{ $ipas->count() + 1 }}">
                Belum ada data bahan kimia.
            </td>
        </tr>
    @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
