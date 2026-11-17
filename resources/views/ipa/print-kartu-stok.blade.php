<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Kartu Stok IPA - {{ $bahan->nama_bahan }}</title>

    <style>
        @page {
            size: A4 landscape;
            margin: 12mm;
        }

        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 11px;
            color: #000;
            margin: 0;
        }

        .no-print {
            text-align: right;
            margin-bottom: 15px;
        }

        .btn-print {
            padding: 8px 15px;
            background: #eee;
            border: 1px solid #333;
            cursor: pointer;
            font-size: 12px;
        }

        /* KOP PERUSAHAAN */
        .header {
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 85px;
            border-bottom: 2px solid #000;
            margin-bottom: 15px;
            padding: 10px 0;
        }

        .logo-perumda {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            width: 65px;
            height: 65px;
            object-fit: contain;
        }

        .header-text {
            width: 100%;
            text-align: center;
        }

        .header-text h2 {
            font-size: 16px;
            margin: 0 0 5px;
            font-weight: bold;
        }

        .header-text h3 {
            font-size: 12px;
            margin: 5px 0;
        }

        .header-text p {
            font-size: 10px;
            margin: 5px 0 0;
        }

        /* INFORMASI BAHAN */
        .info {
            margin-bottom: 15px;
            line-height: 1.7;
        }

        .info table {
            border-collapse: collapse;
        }

        .info td {
            border: none;
            padding: 1px 8px 1px 0;
        }

        /* TABEL MUTASI */
        .tabel-stok {
            width: 100%;
            border-collapse: collapse;
        }

        .tabel-stok th,
        .tabel-stok td {
            border: 1px solid #000;
            padding: 7px;
            font-size: 10px;
        }

        .tabel-stok th {
            text-align: center;
            font-weight: bold;
        }

        .text-center {
            text-align: center;
        }

        .text-right {
            text-align: right;
        }

        /* TANDA TANGAN */
        .ttd {
            width: 100%;
            margin-top: 35px;
            page-break-inside: avoid;
        }

        .ttd td {
            border: none;
            text-align: center;
            vertical-align: top;
        }

        .nama-petugas {
            margin-top: 45px;
            font-weight: bold;
            text-decoration: underline;
        }

        @media print {
            .no-print {
                display: none !important;
            }

            body {
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
            }

            thead {
                display: table-header-group;
            }

            tr {
                page-break-inside: avoid;
            }
        }
    </style>
</head>

<body>

    <div class="no-print">
        <button class="btn-print" onclick="window.print()">
            Cetak / Simpan PDF
        </button>
    </div>

    {{-- KOP PERUMDA --}}
    <div class="header">

        <img src="{{ asset('assets/img/pdam.png') }}" class="logo-perumda" alt="Logo Perumda">

        <div class="header-text">
            <h2>PERUMDA TIRTAKENCANA KOTA SAMARINDA</h2>
            <h3>KARTU STOK BAHAN KIMIA IPA</h3>

            <p>
                Periode:

                @if ($tanggalAwal && $tanggalAkhir)
                    {{ \Carbon\Carbon::parse($tanggalAwal)->translatedFormat('d F Y') }}
                    -
                    {{ \Carbon\Carbon::parse($tanggalAkhir)->translatedFormat('d F Y') }}
                @elseif($tanggalAwal)
                    Mulai
                    {{ \Carbon\Carbon::parse($tanggalAwal)->translatedFormat('d F Y') }}
                @elseif($tanggalAkhir)
                    Sampai
                    {{ \Carbon\Carbon::parse($tanggalAkhir)->translatedFormat('d F Y') }}
                @else
                    Seluruh Periode
                @endif
            </p>
        </div>

    </div>

    {{-- INFORMASI BAHAN --}}
    <div class="info">

        <table>
            <tr>
                <td><strong>IPA</strong></td>
                <td>:</td>
                <td>{{ auth()->user()->ipa }}</td>
            </tr>

            <tr>
                <td><strong>Nama Bahan</strong></td>
                <td>:</td>
                <td>{{ $bahan->nama_bahan }}</td>
            </tr>

            <tr>
                <td><strong>Satuan</strong></td>
                <td>:</td>
                <td>{{ $bahan->satuan->nama_satuan ?? '-' }}</td>
            </tr>

            <tr>
                <td><strong>Stok Saat Ini</strong></td>
                <td>:</td>
                <td>
                    {{ number_format($stokSekarang, 2, ',', '.') }}
                    {{ $bahan->satuan->nama_satuan ?? '' }}
                </td>
            </tr>

            <tr>
                <td><strong>Tanggal Cetak</strong></td>
                <td>:</td>
                <td>{{ $tanggalCetak->format('d/m/Y H:i:s') }}</td>
            </tr>
        </table>

    </div>

    {{-- TABEL RIWAYAT MUTASI --}}
    <table class="tabel-stok">

        <thead>
            <tr>
                <th width="35">NO</th>
                <th width="125">WAKTU</th>
                <th>TRANSAKSI</th>
                <th width="90">JENIS</th>
                <th width="100">STOK AWAL</th>
                <th width="115">MASUK/KEMBALI</th>
                <th width="90">KELUAR</th>
                <th width="100">STOK AKHIR</th>
                <th width="120">PETUGAS</th>
            </tr>
        </thead>

        <tbody>

            @forelse ($logs as $log)
                <tr>
                    <td class="text-center">
                        {{ $loop->iteration }}
                    </td>

                    <td class="text-center">
                        {{ $log->created_at->format('d-m-Y H:i:s') }}
                    </td>

                    <td>
                        {{ $log->id_transaksi ?? '-' }}
                    </td>

                    <td class="text-center">
                        {{ strtoupper($log->jenis) }}
                    </td>

                    <td class="text-right">
                        {{ number_format($log->awal, 2, ',', '.') }}
                    </td>

                    <td class="text-right">
                        {{ in_array($log->jenis, ['masuk', 'pembatalan']) ? number_format($log->jumlah, 2, ',', '.') : '-' }}
                    </td>

                    <td class="text-right">
                        {{ $log->jenis === 'keluar' ? number_format($log->jumlah, 2, ',', '.') : '-' }}
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
                    <td colspan="9" class="text-center">
                        Belum ada riwayat pergerakan stok.
                    </td>
                </tr>
            @endforelse

        </tbody>

    </table>

    {{-- TANDA TANGAN --}}
    <div class="ttd">

        <table width="100%">
            <tr>
                <td width="50%"></td>

                <td width="50%">
                    Samarinda,
                    {{ $tanggalCetak->translatedFormat('d F Y') }}

                    <br>
                    Petugas Gudang IPA

                    <div class="nama-petugas">
                        {{ auth()->user()->name }}
                    </div>
                </td>
            </tr>
        </table>

    </div>

</body>

</html>
