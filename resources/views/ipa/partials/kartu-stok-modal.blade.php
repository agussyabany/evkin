<div class="mb-3">
    <h5 class="font-weight-bold">
        <i class="fas fa-flask mr-1"></i>
        {{ $bahan->nama_bahan }}
    </h5>
    <small class="text-muted">
        Satuan: {{ $bahan->satuan->nama_satuan ?? '-' }}
    </small>
</div>

<div class="row mb-3">
    <div class="col-md-6">
        <div class="small-box bg-info">
            <div class="inner">
                <h4>{{ number_format($stok->stok, 2, ',', '.') }}</h4>
                <p>Stok Saat Ini</p>
            </div>
            <div class="icon">
                <i class="fas fa-boxes"></i>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="small-box bg-warning">
            <div class="inner">
                <h4>{{ number_format($stokMinimum, 2, ',', '.') }}</h4>
                <p>Stok Minimum</p>
            </div>
            <div class="icon">
                <i class="fas fa-exclamation-triangle"></i>
            </div>
        </div>
    </div>
</div>

<form id="formFilterKartuStok" class="mb-3">
    <div class="row">
        <div class="col-md-5">
            <label>Tanggal Awal</label>
            <input type="date"
                   name="tanggal_awal"
                   class="form-control"
                   value="{{ request('tanggal_awal') }}">
        </div>

        <div class="col-md-5">
            <label>Tanggal Akhir</label>
            <input type="date"
                   name="tanggal_akhir"
                   class="form-control"
                   value="{{ request('tanggal_akhir') }}">
        </div>

        <div class="col-md-2 d-flex align-items-end">
            <button type="submit" class="btn btn-primary btn-block">
                <i class="fas fa-filter"></i> Filter
            </button>
        </div>
    </div>
</form>

<div class="table-responsive">
    <table class="table table-bordered table-striped table-sm">
        <thead class="bg-dark text-center">
            <tr>
                <th>No.</th>
                <th>Waktu</th>
                <th>Transaksi</th>
                <th>Jenis</th>
                <th>Stok Awal</th>
                <th>Masuk/Kembali</th>
                <th>Keluar</th>
                <th>Stok Akhir</th>
                <th>Petugas</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($logs as $log)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td>{{ $log->created_at->format('d/m/Y H:i') }}</td>
                    <td>{{ $log->id_transaksi ?? '-' }}</td>
                    <td class="text-center">
                        @if ($log->jenis === 'masuk')
                            <span class="badge badge-success">Masuk</span>
                        @elseif ($log->jenis === 'keluar')
                            <span class="badge badge-danger">Keluar</span>
                        @elseif ($log->jenis === 'pembatalan')
                            <span class="badge badge-warning">Pembatalan</span>
                        @else
                            <span class="badge badge-secondary">
                                {{ ucfirst($log->jenis) }}
                            </span>
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
                    <td class="text-right font-weight-bold">
                        {{ number_format($log->akhir, 2, ',', '.') }}
                    </td>
                    <td>
                        {{ $log->userRelasi->name ?? '-' }}
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="9" class="text-center text-muted">
                        Belum ada riwayat pergerakan stok pada periode ini.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>