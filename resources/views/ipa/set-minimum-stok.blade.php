@extends('layouts.main')

@section('title')
    EVKIN | Pengaturan Minimum Stok IPA
@endsection

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-sm-8">
                    <h1><i class="fas fa-sliders-h text-primary mr-2"></i>Pengaturan Minimum Stok</h1>
                    <small class="text-muted">
                        Atur batas minimum bahan kimia untuk IPA {{ Auth::user()->ipaRelasi->nama_ipa ?? '' }}.
                    </small>
                </div>
                <div class="col-sm-4 text-sm-right mt-2 mt-sm-0">
                    <a href="{{ url('/ipa') }}" class="btn btn-default">
                        <i class="fas fa-arrow-left mr-1"></i> Kembali ke Stok IPA
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show">
                    <i class="fas fa-check-circle mr-1"></i>{{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Pengaturan belum berhasil disimpan.</strong>
                    <ul class="mb-0 mt-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="callout callout-info">
                <h5><i class="fas fa-info-circle mr-1"></i> Informasi</h5>
                Pengaturan berlaku khusus untuk IPA yang sedang login. Stok positif yang sama dengan atau di bawah batas minimum akan berstatus <strong>Menipis</strong>. Stok nol berstatus <strong>Habis</strong>.
            </div>

            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-boxes mr-1"></i> Daftar Bahan dan Batas Minimum</h3>
                    <div class="card-tools"><span class="badge badge-primary">{{ $stok->count() }} jenis bahan</span></div>
                </div>

                <form action="{{ route('ipa.set-minimum-stok.update') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="input-group">
                                    <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-search"></i></span></div>
                                    <input type="text" id="cariBahanMinimum" class="form-control" placeholder="Cari nama bahan kimia...">
                                </div>
                            </div>
                            <div class="col-md-6 text-md-right mt-2 mt-md-0">
                                <small class="text-muted">Isi 0 jika peringatan minimum belum ingin diaktifkan.</small>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">
                                <thead class="thead-light">
                                    <tr class="text-center">
                                        <th style="width:60px">No.</th>
                                        <th>Nama Bahan</th>
                                        <th style="width:150px">Stok Saat Ini</th>
                                        <th style="width:150px">Satuan</th>
                                        <th style="width:220px">Minimum Stok</th>
                                        <th style="width:150px">Status</th>
                                    </tr>
                                </thead>
                                <tbody id="tabelMinimumStok">
                                    @forelse ($stok as $item)
                                        @php
                                            $namaBahan = $item->bahan->nama_bahan ?? 'Bahan tidak diketahui';
                                            $stokSekarang = (float) $item->stok;
                                            $minimum = (float) ($settings[$item->id_bahan] ?? 0);
                                            if ($stokSekarang <= 0) {
                                                $statusMinimum = 'habis';
                                            } elseif ($minimum > 0 && $stokSekarang <= $minimum) {
                                                $statusMinimum = 'menipis';
                                            } else {
                                                $statusMinimum = 'aman';
                                            }
                                        @endphp
                                        <tr data-nama="{{ strtolower($namaBahan) }}">
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td class="font-weight-bold">{{ $namaBahan }}</td>
                                            <td class="text-right">{{ number_format($stokSekarang, 2, ',', '.') }}</td>
                                            <td class="text-center">{{ $item->bahan->satuan->nama_satuan ?? '-' }}</td>
                                            <td>
                                                <input type="number"
                                                    class="form-control text-right input-minimum"
                                                    name="items[{{ $item->id_bahan }}][stok_minimum]"
                                                    min="0" max="9999999999999.99" step="0.01" required
                                                    value="{{ old('items.'.$item->id_bahan.'.stok_minimum', $settings[$item->id_bahan] ?? '0') }}"
                                                    aria-label="Minimum stok {{ $namaBahan }}">
                                            </td>
                                            <td class="text-center status-minimum">
                                                @if ($statusMinimum === 'habis')
                                                    <span class="badge badge-danger">Habis</span>
                                                @elseif ($statusMinimum === 'menipis')
                                                    <span class="badge badge-warning">Menipis</span>
                                                @else
                                                    <span class="badge badge-success">Aman</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @empty
                                        <tr><td colspan="6" class="text-center text-muted py-4">Belum ada data stok untuk IPA ini.</td></tr>
                                    @endforelse
                                    <tr id="minimumTidakDitemukan" style="display:none">
                                        <td colspan="6" class="text-center text-muted">Bahan tidak ditemukan.</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-between flex-wrap">
                        <small class="text-muted align-self-center mb-2 mb-md-0">Pengaturan hanya berlaku untuk IPA yang sedang login.</small>
                        <button type="submit" class="btn btn-primary"><i class="fas fa-save mr-1"></i> Simpan Pengaturan</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>

<script>
$(function () {
    $('#cariBahanMinimum').on('input', function () {
        const kata = String($(this).val() || '').toLowerCase().trim();
        let terlihat = 0;

        $('#tabelMinimumStok tr[data-nama]').each(function () {
            const baris = $(this);
            const cocok = String(baris.attr('data-nama') || '').includes(kata);
            baris.toggle(cocok);
            if (cocok) terlihat++;
        });

        $('#minimumTidakDitemukan').toggle(terlihat === 0);
    });

    $('#tabelMinimumStok').on('input', '.input-minimum', function () {
        const baris = $(this).closest('tr');
        const teksStok = String(baris.children('td').eq(2).text()).replace(/\./g, '').replace(',', '.');
        const stok = parseFloat(teksStok) || 0;
        const minimum = parseFloat($(this).val()) || 0;
        const kolomStatus = baris.find('.status-minimum');

        if (stok <= 0) {
            kolomStatus.html('<span class="badge badge-danger">Habis</span>');
        } else if (minimum > 0 && stok <= minimum) {
            kolomStatus.html('<span class="badge badge-warning">Menipis</span>');
        } else {
            kolomStatus.html('<span class="badge badge-success">Aman</span>');
        }
    });
});
</script>
@endsection
