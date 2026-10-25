@extends('layouts.main')

@section('content')
    <div class="container-fluid">
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
                                    <td class="text-left">
                                        {{ $bahan->nama }}
                                    </td>

                                    @foreach ($ipas as $ipa)
                                        <td>
                                            @if (isset($stokMatrix[$bahan->id][$ipa->id]))
                                                {{ number_format($stokMatrix[$bahan->id][$ipa->id], 2, ',', '.') }}
                                            @else
                                                0
                                            @endif
                                        </td>
                                    @endforeach
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="{{ $ipas->count() + 1 }}">
                                        Belum ada data bahan atau stok IPA.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
