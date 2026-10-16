@extends('layouts.main')

@section('title')
    EVKIN | Dashboard Gudang IPA
@endsection

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-sm-8">
                    <h1 class="m-0">
                        <i class="fas fa-warehouse text-primary mr-2"></i>
                        Gudang IPA {{ Auth::user()->ipaRelasi->nama_ipa }}
                    </h1>
                    <small class="text-muted">Ringkasan persediaan bahan kimia dan pengelolaan stok IPA.</small>
                </div>
                <div class="col-sm-4 text-sm-right mt-3 mt-sm-0">
                    @if (Auth::user()->hasAnyRole(['gudang', 'agus', 'ipa']))
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalMasuk" id="tambah_ipa">
                            <i class="fas fa-dolly mr-1"></i> Pengeluaran Bahan
                        </button>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            @php
                $totalJenisBahan = $stok->count();
                $jenisTersedia = $stok->filter(function ($item) {
                    return (float) $item->stok > 0;
                })->count();
                $jenisHabis = $stok->filter(function ($item) {
                    return (float) $item->stok <= 0;
                })->count();
                $totalKilo = $stok->sum(function ($item) {
                    return (float) ($item->bahan->ukuran ?? 0) * (float) $item->stok;
                });

                $jenisMenipis = $stok->filter(function ($item) {
                $jumlah = (float) $item->stok;
                $minimum = (float) ($item->stok_minimum ?? 0);

                return $jumlah > 0 && $minimum > 0 && $jumlah <= $minimum;
            })->count();
            @endphp

            <div class="row">
                <div class="col-6 col-md-3">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ number_format($totalJenisBahan, 0, ',', '.') }}</h3>
                            <p>Jenis Bahan</p>
                        </div>
                        <div class="icon"><i class="fas fa-flask"></i></div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{ number_format($jenisTersedia, 0, ',', '.') }}</h3>
                            <p>Bahan Tersedia</p>
                        </div>
                        <div class="icon"><i class="fas fa-boxes"></i></div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{ number_format($jenisHabis, 0, ',', '.') }}</h3>
                            <p>Stok Habis</p>
                        </div>
                        <div class="icon"><i class="fas fa-exclamation-triangle"></i></div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="small-box bg-primary">
                        <div class="inner">
                            <h3>{{ number_format($totalKilo, 0, ',', '.') }} <sup style="font-size: 14px">kg</sup></h3>
                            <p>Total Berat Persediaan*</p>
                        </div>
                        <div class="icon"><i class="fas fa-weight-hanging"></i></div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{ $jenisMenipis }}</h3>
                        <p>Stok Menipis</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-exclamation-triangle"></i>
                    </div>
                </div>
</div>
            </div>

            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-box-open mr-1"></i> Persediaan Bahan Kimia
                    </h3>
                    <div class="card-tools">
                        <span class="badge badge-light">{{ $totalJenisBahan }} jenis bahan</span>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-6 mb-2 mb-md-0">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-search"></i></span>
                                </div>
                                <input type="text" id="cariBahan" class="form-control" placeholder="Cari nama bahan kimia...">
                            </div>
                        </div>
                        <div class="col-md-3 mb-2 mb-md-0">
                            <select id="filterStok" class="form-control">
                                <option value="">Semua status stok</option>
                                <option value="tersedia">Stok tersedia</option>
                                <option value="habis">Stok habis</option>
                                <option value="aman">Stok aman</option>
                                <option value="menipis">Stok menipis</option>
                            </select>
                        </div>
                        <div class="col-md-3 text-md-right">
                            <button type="button" class="btn btn-default" id="resetFilter">
                                <i class="fas fa-undo mr-1"></i> Reset Filter
                            </button>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped">
                            <thead class="thead-light">
                                <tr class="text-center">
                                    <th style="width: 60px">No.</th>
                                    <th>Nama Bahan</th>
                                    <th style="width: 130px">Jumlah</th>
                                    <th style="width: 130px">Satuan</th>
                                    <th style="width: 140px">Berat (kg)</th>
                                    <th style="width: 140px">Status</th>
                                    <th style="width: 130px">Stok Minimum</th>
                                    <th style="width: 120px">Kartu Stok</th>
                                </tr>
                            </thead>
                            <tbody id="tabelStok">
                                @forelse ($stok as $item)
                                    @php
                                        $jumlahStok = (float) $item->stok;

                                        // Minimum stok dari tabel pengaturan per IPA
                                        $batasMinimum = (float) ($minimumStok[$item->id_bahan] ?? 0);

                                        // Berat stok
                                        $beratStok = (float) ($item->bahan->ukuran ?? 0) * $jumlahStok;

                                        // Tentukan status stok
                                        if ($jumlahStok <= 0) {
                                            $statusStok = 'habis';
                                        } elseif ($batasMinimum > 0 && $jumlahStok <= $batasMinimum) {
                                            $statusStok = 'menipis';
                                        } else {
                                            $statusStok = 'aman';
                                        }
                                    @endphp
                                    <tr data-bahan="{{ strtolower($item->bahan->nama_bahan ?? '') }}"
                                        data-status="{{ $statusStok }}">
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td>
                                            <div class="font-weight-bold">{{ $item->bahan->nama_bahan ?? '-' }}</div>
                                        </td>
                                        <td class="text-right">{{ number_format($jumlahStok, 2, ',', '.') }}</td>
                                        <td class="text-center">{{ $item->bahan->satuan->nama_satuan ?? '-' }}</td>
                                        <td class="text-right">{{ number_format($beratStok, 2, ',', '.') }}</td>
                                        <td class="text-center">
                                            @if ($statusStok === 'habis')
                                                <span class="badge badge-danger">
                                                    <i class="fas fa-times-circle mr-1"></i> Habis
                                                </span>
                                            @elseif ($statusStok === 'menipis')
                                                <span class="badge badge-warning">
                                                    <i class="fas fa-exclamation-triangle mr-1"></i> Menipis
                                                </span>
                                            @else
                                                <span class="badge badge-success">
                                                    <i class="fas fa-check-circle mr-1"></i> Aman
                                                </span>
                                            @endif
                                        </td>
                                        <td class="text-right">
                                           {{ number_format($batasMinimum, 2, ',', '.') }}
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ route('ipa.kartu-stok', $item->id_bahan) }}"
                                               class="btn btn-info btn-sm"
                                               title="Lihat Kartu Stok"
                                               aria-label="Lihat kartu stok {{ $item->bahan->nama_bahan ?? '' }}">
                                                <i class="fas fa-eye mr-1"></i> Lihat
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center text-muted py-4">
                                            <i class="fas fa-box-open fa-2x mb-2 d-block"></i>
                                            Belum ada data stok untuk IPA ini.
                                        </td>
                                    </tr>
                                @endforelse
                                <tr id="barisTidakDitemukan" style="display:none">
                                    <td colspan="7" class="text-center text-muted py-3">Bahan tidak ditemukan untuk filter tersebut.</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <small class="text-muted">*Total berat dihitung dari ukuran bahan dikalikan jumlah stok. Pastikan nilai ukuran pada master bahan sudah menggunakan satuan kilogram yang konsisten.</small>
                </div>
            </div>
        </div>
    </section>
</div>

{{-- Modal pengeluaran dipertahankan agar ID dan data input tetap kompatibel dengan JavaScript yang sudah ada --}}
<div class="modal fade" id="modalMasuk" tabindex="-1" role="dialog" aria-labelledby="judul_ipa" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h4 class="modal-title" id="judul_ipa">
                    <i class="fas fa-dolly mr-2"></i>Input Bahan Kimia Keluar
                </h4>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="no_transaksi">No. Transaksi</label>
                        <input type="text" class="form-control" id="no_transaksi" readonly>
                    </div>
                    <div class="col-md-6">
                        <label for="tanggal">Tanggal</label>
                        <input type="date" class="form-control" id="tanggal" value="{{ date('Y-m-d') }}">
                    </div>
                    <div class="col-md-6 mt-2">
                        <label>Dikeluarkan Oleh</label>
                        <input type="text" class="form-control" value="{{ Auth::user()->name }}" readonly>
                    </div>
                    <div class="col-md-6 mt-2">
                        <label>IPA</label>
                        <input type="text" class="form-control" value="{{ Auth::user()->ipaRelasi->nama_ipa }}" readonly>
                    </div>
                </div>

                <form id="formKeluar">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead class="thead-light">
                                <tr>
                                    <th style="width:60px">No.</th>
                                    <th>Bahan</th>
                                    <th>Stok Tersedia</th>
                                    <th>Satuan</th>
                                    <th style="width:160px">Jumlah Keluar</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($stok as $i => $s)
                                    <tr>
                                        <td>{{ $i + 1 }}</td>
                                        <td>{{ $s->bahan->nama_bahan ?? '-' }}</td>
                                        <td>{{ number_format((float) $s->stok, 2, ',', '.') }}</td>
                                        <td>{{ $s->bahan->satuan->nama_satuan ?? '-' }}</td>
                                        <td>
                                            <input type="number"
                                                   class="form-control qty"
                                                   data-id_bahan="{{ $s->id_bahan }}"
                                                   data-id_satuan="{{ $s->bahan->id_satuan }}"
                                                   max="{{ $s->stok }}"
                                                   min="0"
                                                   step="0.01"
                                                   value="0">
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                <button type="button" id="btn-submit" class="btn btn-success">
                    <i class="fas fa-save mr-1"></i> Simpan Pengeluaran
                </button>
            </div>
        </div>
    </div>
</div>

@include('sweetalert::alert')

<script>
    const namaIpa = @json(Auth::user()->ipaRelasi->nama_ipa);

    $(function () {
        function filterTabelStok() {
            const pencarian = ($('#cariBahan').val() || '').toLowerCase().trim();
            const status = $('#filterStok').val();
            let jumlahTerlihat = 0;

            $('#tabelStok tr[data-bahan]').each(function () {
                const baris = $(this);
                const nama = String(baris.data('bahan') || '');
                const statusBaris = String(baris.data('status') || '');
                const cocokNama = nama.includes(pencarian);
                const cocokStatus = !status || statusBaris === status;
                const tampil = cocokNama && cocokStatus;

                baris.toggle(tampil);
                if (tampil) jumlahTerlihat++;
            });

            $('#barisTidakDitemukan').toggle(jumlahTerlihat === 0);
        }

        $('#cariBahan, #filterStok').on('input change', filterTabelStok);

        $('#resetFilter').on('click', function () {
            $('#cariBahan').val('');
            $('#filterStok').val('');
            filterTabelStok();
        });
    });
</script>
@endsection
