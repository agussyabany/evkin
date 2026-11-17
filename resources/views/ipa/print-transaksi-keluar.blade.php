<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Print Transaksi Keluar IPA</title>

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
            line-height: 1.8;
            margin-bottom: 18px;
        }

        .identitas table {
            width: 100%;
        }

        .identitas td {
            padding: 2px 4px;
            vertical-align: top;
        }

        .identitas td:first-child {
            width: 130px;
        }

        .judul-detail {
            font-weight: bold;
            margin-bottom: 8px;
        }

        table.detail {
            width: 100%;
            border-collapse: collapse;
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

        .total {
            margin-top: 10px;
            text-align: right;
            font-weight: bold;
        }

        .ttd {
            width: 100%;
            margin-top: 55px;
        }

        .ttd td {
            width: 50%;
            text-align: center;
            vertical-align: top;
        }

        .nama {
            padding-top: 60px;
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

    <div class="kop">
        <img src="{{ asset('assets/img/pdam.png') }}" class="logo" alt="Logo Perumda">

        <div class="kop-tengah">
            <h2>PERUMDA TIRTAKENCANA KOTA SAMARINDA</h2>
            <h3>BUKTI TRANSAKSI KELUAR BAHAN KIMIA IPA</h3>
            <p>Dokumen Pengeluaran Bahan Kimia</p>
        </div>
    </div>

    <div class="identitas">
        <table>
            <tr>
                <td><strong>Nomor Transaksi</strong></td>
                <td>: {{ $transaksi->id_transaksi }}</td>
            </tr>

            <tr>
                <td><strong>Tanggal Transaksi</strong></td>
                <td>: {{ $transaksi->created_at?->format('d/m/Y H:i') ?? '-' }}</td>
            </tr>

            <tr>
                <td><strong>IPA</strong></td>
                <td>: {{ $transaksi->ipa->nama_ipa ?? ($transaksi->ipa->nama ?? $transaksi->id_ipa) }}</td>
            </tr>

            <tr>
                <td><strong>Petugas</strong></td>
                <td>: {{ $transaksi->userRelasi->name ?? '-' }}</td>
            </tr>
        </table>
    </div>

    <div class="judul-detail">
        RINCIAN BAHAN KIMIA KELUAR
    </div>

    <table class="detail">
        <thead>
            <tr>
                <th width="7%">No</th>
                <th>Nama Bahan</th>
                <th width="18%">Jumlah Keluar</th>
                <th width="18%">Satuan</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($transaksi->detail as $item)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>

                    <td>{{ $item->bahan->nama_bahan ?? '-' }}</td>

                    <td class="text-right">
                        {{ number_format((float) $item->jumlah, 2, ',', '.') }}
                    </td>

                    <td class="text-center">
                        {{ $item->satuan->nama_satuan ?? ($item->bahan->satuan->nama_satuan ?? '-') }}
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">
                        Tidak ada detail transaksi.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="total">
        Total jenis bahan: {{ $transaksi->detail->count() }}
    </div>

    <table class="ttd">
        <tr>
            <td>
                Petugas Gudang IPA
                <div class="nama">
                    {{ $transaksi->userRelasi->name ?? '........................' }}
                </div>
            </td>

            <td>
                Samarinda, {{ now()->translatedFormat('d F Y') }}
                <br>
                Penerima
                <div class="nama">
                    ........................
                </div>
            </td>
        </tr>
    </table>

</body>

</html>
