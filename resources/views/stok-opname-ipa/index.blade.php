@extends('layouts.main')

@section('title', 'Riwayat Stok Opname IPA')

@section('content')
    <div class="content-wrapper">

        <section class="content-header">
            <div class="container-fluid">
                <h1>Riwayat Stok Opname IPA</h1>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">

                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title">Daftar Stok Opname</h3>

                        <div class="card-tools">
                            <a href="{{ route('stok-opname-ipa.create') }}" class="btn btn-primary btn-sm">
                                <i class="fas fa-plus"></i>
                                Buat Stok Opname
                            </a>
                        </div>
                    </div>

                    <div class="card-body table-responsive">
                        {{-- TAMPILKAN ERROR VALIDASI --}}
                        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show">
                                <strong>Terjadi kesalahan:</strong>

                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>

                                <button type="button" class="close" data-dismiss="alert">
                                    <span>&times;</span>
                                </button>
                            </div>
                        @endif
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show">
                                <i class="fas fa-check-circle mr-1"></i>
                                {{ session('success') }}

                                <button type="button" class="close" data-dismiss="alert">
                                    <span>&times;</span>
                                </button>
                            </div>
                        @endif
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>No. Opname</th>
                                    <th>Periode</th>
                                    <th>Tanggal</th>
                                    <th>Petugas</th>
                                    <th>Status</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse($opname as $i => $item)
                                    <tr>
                                        <td>{{ $i + 1 }}</td>
                                        <td>
                                            <a href="{{ route('stok-opname-ipa.show', $item->id) }}">
                                            {{ $item->no_opname }}
                                            </a>
                                       </td>
                                        <td>{{ $item->periode?->format('m/Y') }}</td>
                                        <td>{{ $item->tanggal_opname?->format('d/m/Y H:i') }}</td>
                                        <td>{{ $item->petugas->name ?? '-' }}</td>
                                        <td>
                                            @if ($item->posted_at)
                                                <span class="badge badge-success">
                                                    Posted
                                                </span>
                                            @else
                                                <span class="badge badge-warning">
                                                    Draft
                                                </span>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">
                                            Belum ada riwayat stok opname.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </section>
    </div>
@endsection
