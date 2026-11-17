<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Print Permintaan Bahan Kimia</title>

    <style>
        @page {
            size: A4 portrait;
            margin: 15mm;
        }

        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            font-size: 11px;
            color: #000;
            margin: 0;
        }

        .print-button {
            padding: 8px 15px;
            margin-bottom: 20px;
            cursor: pointer;
        }

        .kop {
            display: flex;
            align-items: center;
            border-bottom: 2px solid #000;
            padding-bottom: 12px;
            margin-bottom: 15px;
        }

        .logo {
            width: 75px;
            height: 75px;
            object-fit: contain;
        }

        .kop-tengah {
            flex: 1;
            text-align: center;
            padding-right: 75px;
        }

        .kop-tengah h2 {
            font-size: 16px;
            margin: 0 0 5px;
        }

        .kop-tengah h3 {
            font-size: 13px;
            margin: 0 0 5px;
        }

        .kop-tengah p {
            font-size: 10px;
            margin: 0;
        }

        .identitas {
            margin-bottom: 15px;
            line-height: 1.8;
        }

        .identitas table {
            width: 100%;
        }

        .identitas td {
            padding: 2px 4px;
            vertical-align: top;
        }

        .identitas td:first-child {
            width: 125px;
        }

        .detail-title {
            font-weight: bold;
            margin: 15px 0 8px;
        }

        table.detail {
            width: 100%;
            border-collapse: collapse;
            margin-top: 5px;
        }

        table.detail th,
        table.detail td {
            border: 1px solid #000;
            padding: 7px 5px;
        }

        table.detail th {
            text-align: center;
            background: #eee;
        }

        .text-center {
            text-align: center;
        }

        .text-right {
            text-align: right;
        }

        .status {
            margin-top: 12px;
            font-weight: bold;
        }

        .catatan {
            margin-top: 15px;
        }

        .ttd {
            width: 100%;
            margin-top: 45px;
        }

        .ttd td {
            width: 50%;
            text-align: center;
            vertical-align: top;
        }

        .ttd .nama {
            padding-top: 55px;
            font-weight: bold;
            text-decoration: underline;
        }

        @media print {
            .print-button {
                display: none;
            }
        }
    </style>
</head>

<body>

    <button class="print-button" onclick="window.print()">
        Cetak / Simpan PDF
    </button>

    {{-- KOP SURAT --}}
    <div class="kop">

        <img src="{{ asset('assets/img/pdam.png') }}" class="logo" alt="Logo Perumda">

        <div class="kop-tengah">
            <h2>PERUMDA TIRTAKENCANA KOTA SAMARINDA</h2>
            <h3>PERMINTAAN BAHAN KIMIA IPA</h3>
            <p>Dokumen Permintaan Bahan Kimia</p>
        </div>

    </div>

    {{-- IDENTITAS PERMINTAAN --}}
    <div class="identitas">

        <table>
            <tr>
                <td><strong>Nomor Permintaan</strong></td>
                <td>: {{ $permintaan->no_permintaan }}</td>
            </tr>

            <tr>
                <td><strong>Tanggal Permintaan</strong></td>
                <td>: {{ $permintaan->created_at->format('d/m/Y H:i') }}</td>
            </tr>

            <tr>
                <td><strong>IPA</strong></td>
                <td>:
                    {{ $permintaan->ipa->nama_ipa ?? ($permintaan->ipa->nama ?? $permintaan->id_ipa) }}
                </td>
            </tr>

            <tr>
                <td><strong>Peminta</strong></td>
                <td>: {{ $permintaan->user->name ?? '-' }}</td>
            </tr>

            <tr>
                <td><strong>Status</strong></td>
                <td>:
                    {{ $permintaan->statusRelasi->nama_status ?? '-' }}
                </td>
            </tr>
        </table>

    </div>

    {{-- TABEL DETAIL --}}
    <div class="detail-title">
        RINCIAN PERMINTAAN BAHAN KIMIA
    </div>

    <table class="detail">

        <thead>
            <tr>
                <th width="5%">No</th>
                <th>Nama Bahan</th>
                <th width="12%">Jumlah Diminta</th>
                <th width="12%">Jumlah Dikirim</th>
                <th width="12%">Jumlah Diterima</th>
                <th width="10%">Satuan</th>
            </tr>
        </thead>

        <tbody>

            @forelse ($detail as $item)
                <tr>
                    <td class="text-center">
                        {{ $loop->iteration }}
                    </td>

                    <td>
                        {{ $item->bahan->nama_bahan ?? '-' }}
                    </td>

                    <td class="text-right">
                        {{ number_format((float) ($item->jumlah ?? 0), 2, ',', '.') }}
                    </td>

                    <td class="text-right">
                        {{ number_format((float) ($item->jumlah_kirim ?? 0), 2, ',', '.') }}
                    </td>

                    <td class="text-right">
                        {{ number_format((float) ($item->jumlah_terima ?? 0), 2, ',', '.') }}
                    </td>

                    <td class="text-center">
                        {{ $item->bahan->satuan->nama_satuan ?? '-' }}
                    </td>
                </tr>

            @empty

                <tr>
                    <td colspan="6" class="text-center">
                        Tidak ada detail permintaan.
                    </td>
                </tr>
            @endforelse

        </tbody>

    </table>

    {{-- CATATAN --}}
    <div class="catatan">
        <strong>Catatan:</strong>
        <br>
        {{ $permintaan->catatan ?? '-' }}
    </div>

    {{-- TANDA TANGAN --}}
    <table class="ttd">

        <tr>
            <td>
                Peminta
                <div class="nama">
                    {{ $permintaan->user->name ?? '........................' }}
                </div>
            </td>

            <td>
                Samarinda, {{ now()->translatedFormat('d F Y') }}
                <br>
                Petugas Gudang IPA
                <div class="nama">
                    {{ auth()->user()->name }}
                </div>
            </td>
        </tr>

    </table>

</body>

</html>
