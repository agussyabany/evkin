@extends('layouts.main')

@section('title', 'Stok Opname Gudang IPA')

@section('content')
    <div class="content-wrapper">

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Stok Opname Gudang IPA</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                <a href="{{ url('/home') }}">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active">
                                Stok Opname
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">

                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-clipboard-check mr-1"></i>
                            Input Stok Fisik
                        </h3>
                    </div>

                    <form action="{{ route('stok-opname-ipa.store') }}" method="POST">
                        @csrf

                        <div class="card-body">

                            <div class="alert alert-info">
                                Masukkan jumlah stok fisik hasil perhitungan
                                di gudang IPA. Selisih akan dihitung otomatis.
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <label>Periode Opname</label>
                                    <input type="month" name="periode" class="form-control"
                                        value="{{ now()->format('Y-m') }}" required>
                                </div>

                                <div class="col-md-4">
                                    <label>Tanggal Opname</label>
                                    <input type="date" name="tanggal_opname" class="form-control"
                                        value="{{ now()->format('Y-m-d') }}" required>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead class="bg-primary">
                                        <tr>
                                            <th width="5%">No</th>
                                            <th>Nama Bahan</th>
                                            <th width="18%">Stok Sistem</th>
                                            <th width="18%">Stok Fisik</th>
                                            <th width="18%">Selisih</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @forelse($bahan as $i => $item)
                                            <tr>
                                                <td>{{ $i + 1 }}</td>

                                                <td>
                                                    {{ $item->nama_bahan }}
                                                </td>

                                                <td>
                                                    <input type="text" class="form-control text-right"
                                                        value="{{ $item->stok }}" readonly>
                                                </td>

                                                <td>
                                                    <input type="number" step="0.01" min="0"
                                                        name="stok_fisik[{{ $item->id }}]"
                                                        class="form-control text-right stok-fisik"
                                                        data-stok="{{ $item->stok }}" required>
                                                </td>

                                                <td>
                                                    <input type="text" class="form-control text-right selisih" readonly>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="5" class="text-center">
                                                    Belum ada data stok bahan untuk IPA ini.
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>

                            <div class="form-group mt-3">
                                <label>Catatan Opname</label>
                                <textarea name="catatan" class="form-control" rows="3" placeholder="Catatan tambahan (opsional)"></textarea>
                            </div>

                        </div>

                        <div class="card-footer">
                            <a href="{{ route('stok-opname-ipa.index') }}" class="btn btn-secondary">
                                Kembali
                            </a>

                            <button type="submit" class="btn btn-primary" {{ $bahan->isEmpty() ? 'disabled' : '' }}>
                                <i class="fas fa-save mr-1"></i>
                                Posting Stok Opname
                            </button>
                        </div>

                    </form>
                </div>

            </div>
        </section>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).on('input', '.stok-fisik', function() {
            let stokSistem = parseFloat($(this).data('stok')) || 0;
            let stokFisik = parseFloat($(this).val());

            let selisih = $(this).val() === '' ?
                '' :
                stokFisik - stokSistem;

            let kolomSelisih = $(this)
                .closest('tr')
                .find('.selisih');

            kolomSelisih.val(selisih === '' ? '' : selisih.toFixed(2));

            kolomSelisih.removeClass('text-success text-danger');

            if (selisih > 0) {
                kolomSelisih.addClass('text-success');
            } else if (selisih < 0) {
                kolomSelisih.addClass('text-danger');
            }
        });
    </script>
@endsection
