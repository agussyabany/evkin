@extends('layouts.main')

@section('content')
    <div class="container-fluid">

        <div class="d-flex justify-content-between align-items-center mb-3">
            <div>
                <h3>Stok Seluruh IPA</h3>
                <p class="text-muted mb-0">
                    Monitoring stok bahan kimia di seluruh IPA
                </p>
            </div>
        </div>

        {{-- Ringkasan --}}
        <div class="row">
            <div class="col-md-4">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ $totalJenisStok }}</h3>
                        <p>Data Stok Bahan IPA</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-boxes"></i>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>{{ $stokHabis }}</h3>
                        <p>Stok Habis</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-exclamation-triangle"></i>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{ $stokMenipis }}</h3>
                        <p>Stok Menipis</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-exclamation-circle"></i>
                    </div>
                </div>
            </div>
        </div>

        {{-- Filter --}}
        <div class="card">
            <div class="card-body">
                <form method="GET" action="{{ route('monitoring-ipa.stok') }}">
                    <div class="row">
                        <div class="col-md-3">
                            <label>IPA</label>
                            <select name="id_ipa" class="form-control">
                                <option value="">Semua IPA</option>
                                @foreach ($daftarIpa as $idIpa)
                                    <option value="{{ $idIpa }}" {{ request('id_ipa') == $idIpa ? 'selected' : '' }}>
                                        IPA {{ $idIpa }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-5">
                            <label>Nama Bahan Kimia</label>
                            <input type="text" name="search" class="form-control" value="{{ request('search') }}"
                                placeholder="Cari nama bahan...">
                        </div>

                        <div class="col-md-4 d-flex align-items-end">
                            <button type="submit" class="btn btn-primary mr-2">
                                <i class="fas fa-search"></i> Cari
                            </button>

                            <a href="{{ route('monitoring-ipa.stok') }}" class="btn btn-secondary">
                                Reset
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        {{-- Tabel stok --}}
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Daftar Stok IPA</h3>
            </div>

            <div class="card-body table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>IPA</th>
                            <th>Bahan Kimia</th>
                            <th>Satuan</th>
                            <th>Stok Saat Ini</th>
                            <th>Stok Minimum</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($stok as $item)
                            @php
                                $key = $item->id_ipa . '-' . $item->id_bahan;
                                $minimum = (float) optional($minimumStok->get($key))->stok_minimum;

                                $jumlah = (float) $item->stok;

                                if ($jumlah <= 0) {
                                    $status = 'Habis';
                                    $badge = 'danger';
                                } elseif ($minimum > 0 && $jumlah <= $minimum) {
                                    $status = 'Menipis';
                                    $badge = 'warning';
                                } else {
                                    $status = 'Normal';
                                    $badge = 'success';
                                }
                            @endphp

                            <tr>
                                <td>
                                    {{ $stok->firstItem() + $loop->index }}
                                </td>
                                <td>IPA {{ $item->id_ipa }}</td>
                                <td>
                                    {{ $item->bahan->nama ?? 'Bahan tidak ditemukan' }}
                                </td>
                                <td>
                                    {{ $item->bahan->satuan->nama ?? '-' }}
                                </td>
                                <td class="text-right">
                                    {{ number_format($jumlah, 2, ',', '.') }}
                                </td>
                                <td class="text-right">
                                    {{ number_format($minimum, 2, ',', '.') }}
                                </td>
                                <td>
                                    <span class="badge badge-{{ $badge }}">
                                        {{ $status }}
                                    </span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">
                                    Data stok tidak ditemukan.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <div class="mt-3">
                    {{ $stok->links() }}
                </div>
            </div>
        </div>

    </div>
@endsection
