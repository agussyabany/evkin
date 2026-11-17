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

                    <form action="{{ route('stok-opname-ipa.store') }}" method="POST" id="formStokOpname">
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

                            <button type="submit"
                                    id="btnPosting"
                                    class="btn btn-primary"
                                    {{ $bahan->isEmpty() ? 'disabled' : '' }}>

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

@push('scripts')
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
    <script>

            $(document).ready(function () {

                let sedangPosting = false;

                // Hitung selisih otomatis
                $(document).on('input', '.stok-fisik', function () {

                    let stokSistem = parseFloat($(this).data('stok')) || 0;
                    let nilaiInput = $(this).val();

                    let stokFisik = parseFloat(nilaiInput);

                    let selisih = nilaiInput === ''
                        ? ''
                        : stokFisik - stokSistem;

                    let kolomSelisih = $(this)
                        .closest('tr')
                        .find('.selisih');

                    kolomSelisih.val(
                        selisih === '' ? '' : selisih.toFixed(2)
                    );

                    kolomSelisih.removeClass('text-success text-danger');

                    if (selisih > 0) {
                        kolomSelisih.addClass('text-success');
                    } else if (selisih < 0) {
                        kolomSelisih.addClass('text-danger');
                    }
                });

                // Konfirmasi sebelum posting
                $('#formStokOpname').on('submit', function (e) {

                    if (sedangPosting) {
                        e.preventDefault();
                        return false;
                    }

                    e.preventDefault();

                    let form = this;
                    let tombol = $('#btnPosting');

                    // Pastikan seluruh input stok fisik valid
                    let valid = true;

                    $('.stok-fisik').each(function () {

                        let nilai = $(this).val();

                        if (nilai === '' || !Number.isFinite(Number(nilai)) || Number(nilai) < 0) {
                            valid = false;
                        }
                    });

                    if (!valid) {
                        Swal.fire({
                            icon: 'warning',
                            title: 'Input belum lengkap',
                            text: 'Pastikan seluruh stok fisik sudah diisi dengan angka nol atau lebih.'
                        });

                        return false;
                    }

                    Swal.fire({
                        title: 'Posting Stok Opname?',
                        text: 'Saldo stok IPA akan disesuaikan dengan hasil perhitungan fisik. Proses ini tidak dapat dibatalkan secara langsung.',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#007bff',
                        cancelButtonColor: '#6c757d',
                        confirmButtonText: 'Ya, Posting Sekarang',
                        cancelButtonText: 'Periksa Kembali',
                        reverseButtons: true
                    }).then((result) => {

                        if (result.isConfirmed) {

                            sedangPosting = true;

                            tombol.prop('disabled', true);

                            tombol.html(
                                '<i class="fas fa-spinner fa-spin mr-1"></i> Memproses...'
                            );

                            // Submit form tanpa memicu event submit kembali
                            form.submit();
                        }
                    });

                });

            });

    </script>
@endpush
