@extends('layouts.main')

@section('title')
    Riwayat Transaksi Keluar IPA
@endsection

@section('content')
<div class="content-wrapper">

    <div class="content-header">
        <h1 class="text-center">
            RIWAYAT TRANSAKSI KELUAR
            {{ Auth::user()->ipaRelasi->nama_ipa }}
        </h1>
    </div>

    <section class="content">

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Daftar Transaksi</h3>
            </div>

            <div class="card-body table-responsive">
                <table class="table table-bordered table-striped table-sm">
                    <thead class="thead-dark text-center">
                        <tr>
                            <th>NO</th>
                            <th>NO. TRANSAKSI</th>
                            <th>TANGGAL</th>
                            <th>JUMLAH ITEM</th>
                            <th>PETUGAS</th>
                            <th class="text-center">STATUS</th>
                            <th>AKSI</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($transaksi as $item)
                            <tr>
                                <td class="text-center">
                                    {{ $loop->iteration }}
                                </td>

                                <td>
                                    {{ $item->id_transaksi }}
                                </td>

                                <td class="text-center">
                                    {{ $item->created_at
                                        ? $item->created_at->format('d-m-Y H:i')
                                        : '-' }}
                                </td>

                                <td class="text-center">
                                    {{ $item->detail->count() }}
                                </td>

                                <td class="text-center">
                                    {{ $item->userRelasi->name ?? '-' }}
                                </td>
                                <td class="text-center">
                                    @if ($item->status === 'batal')
                                        <span class="badge badge-danger">DIBATALKAN</span>
                                    @else
                                        <span class="badge badge-success">AKTIF</span>
                                    @endif
                                </td>

                                <td class="text-center">
                                    <button
                                        type="button"
                                        class="btn btn-info btn-sm btn-detail"
                                        data-transaksi="{{ $item->id_transaksi }}">
                                        <i class="fa fa-eye"></i>
                                        Detail
                                    </button>
                                    @if ($item->status !== 'batal')
                                        <button
                                            type="button"
                                            class="btn btn-danger btn-sm btn-batal"
                                            data-transaksi="{{ $item->id_transaksi }}">
                                            <i class="fa fa-undo"></i> Batalkan
                                        </button>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center text-muted">
                                    Belum ada transaksi keluar.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </section>
</div>
//Modal
<div class="modal fade" id="modalDetailKeluar" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header bg-info">
                <h5 class="modal-title">Detail Transaksi Keluar IPA</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>

            <div class="modal-body">

                <table class="table table-bordered table-sm">
                    <tr>
                        <th style="width: 35%">No. Transaksi</th>
                        <td id="detail-no-transaksi"></td>
                    </tr>
                    <tr>
                        <th>Tanggal</th>
                        <td id="detail-tanggal"></td>
                    </tr>
                </table>

                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-sm">
                        <thead class="thead-dark text-center">
                            <tr>
                                <th>NO</th>
                                <th>BAHAN</th>
                                <th>JUMLAH</th>
                                <th>SATUAN</th>
                            </tr>
                        </thead>
                        <tbody id="tbodyDetailKeluar">
                            <tr>
                                <td colspan="4" class="text-center">
                                    Memuat data...
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary"
                    data-dismiss="modal">
                    Tutup
                </button>
            </div>

        </div>
    </div>
    //endModal
</div>
@endsection