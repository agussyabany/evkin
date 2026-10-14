@extends('layouts.main')

@section('title')
    Kartu Stok IPA
@endsection

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h1 class="text-center">KARTU STOK GUDANG IPA</h1>
    </section>

    <section class="content">

        <div class="card">
            <div class="card-body">
                <h5>Bahan: {{ $bahan->nama_bahan }}</h5>

                <form method="GET"
                      action="{{ route('ipa.kartu-stok', $bahan->id) }}"
                      class="row mb-3">

                    <div class="col-md-4">
                        <label>Tanggal Awal</label>
                        <input type="date"
                               name="tanggal_awal"
                               class="form-control"
                               value="{{ request('tanggal_awal') }}">
                    </div>

                    <div class="col-md-4">
                        <label>Tanggal Akhir</label>
                        <input type="date"
                               name="tanggal_akhir"
                               class="form-control"
                               value="{{ request('tanggal_akhir') }}">
                    </div>

                    <div class="col-md-4 d-flex align-items-end">
                        <button class="btn btn-primary mr-2">
                            Filter
                        </button>

                        <a href="{{ route('ipa.kartu-stok', $bahan->id) }}"
                           class="btn btn-secondary">
                            Reset
                        </a>
                    </div>
                </form>

                <div class="alert alert-info">
                    Stok saat ini:
                    <strong>{{ number_format($stokSekarang, 2, ',', '.') }}</strong>
                    {{ $bahan->satuan->nama_satuan ?? '' }}
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-sm">
                        <thead class="thead-dark text-center">
                            <tr>
                                <th>NO</th>
                                <th>WAKTU</th>
                                <th>TRANSAKSI</th>
                                <th>JENIS</th>
                                <th>STOK AWAL</th>
                                <th>MASUK/KEMBALI</th>
                                <th>KELUAR</th>
                                <th>STOK AKHIR</th>
                                <th>PETUGAS</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($logs as $log)
                                <tr>
                                    <td class="text-center">
                                        {{ $loop->iteration }}
                                    </td>

                                    <td>
                                        {{ $log->created_at->format('d-m-Y H:i:s') }}
                                    </td>

                                    <td>
                                        {{ $log->id_transaksi ?? '-' }}
                                    </td>

                                    <td class="text-center">
                                        @if ($log->jenis === 'masuk')
                                            <span class="badge badge-success">MASUK</span>
                                        @elseif ($log->jenis === 'keluar')
                                            <span class="badge badge-danger">KELUAR</span>
                                        @else
                                            <span class="badge badge-warning">PEMBATALAN</span>
                                        @endif
                                    </td>

                                    <td class="text-right">
                                        {{ number_format($log->awal, 2, ',', '.') }}
                                    </td>

                                    <td class="text-right">
                                        {{ in_array($log->jenis, ['masuk', 'pembatalan'])
                                            ? number_format($log->jumlah, 2, ',', '.')
                                            : '-' }}
                                    </td>

                                    <td class="text-right">
                                        {{ $log->jenis === 'keluar'
                                            ? number_format($log->jumlah, 2, ',', '.')
                                            : '-' }}
                                    </td>

                                    <td class="text-right">
                                        {{ number_format($log->akhir, 2, ',', '.') }}
                                    </td>

                                    <td>
                                        {{ $log->userRelasi->name ?? '-' }}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="9"
                                        class="text-center text-muted">
                                        Belum ada riwayat pergerakan stok.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <a href="{{ url()->previous() }}"
                   class="btn btn-secondary">
                    Kembali
                </a>
            </div>
        </div>

    </section>
</div>
@endsection