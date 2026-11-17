
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Print Stok IPA</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            color: #000;
            margin: 25px;
        }

        .header {
            text-align: center;
            border-bottom: 2px solid #000;
            padding-bottom: 12px;
            margin-bottom: 20px;
        }

        .header h2 {
            margin: 0 0 5px;
            font-size: 18px;
        }

        .header p {
            margin: 3px 0;
        }

        .info {
            margin-bottom: 15px;
            line-height: 1.8;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #000;
            padding: 8px;
        }

        th {
            text-align: center;
            background: #eee;
        }

        .center {
            text-align: center;
        }

        .right {
            text-align: right;
        }

        .signature {
            width: 250px;
            margin-left: auto;
            margin-top: 45px;
            text-align: center;
            line-height: 1.6;
        }

        .print-button {
            margin-bottom: 20px;
            padding: 8px 15px;
            cursor: pointer;
        }

        @media print {
            .print-button {
                display: none;
            }

            body {
                margin: 10mm;
            }
        }
    </style>
</head>

<body>

<button class="print-button" onclick="window.print()">
    Cetak / Simpan PDF
</button>

<div class="header">
    <h2>PERUMDA TIRTA KENCANA</h2>
    <h3>LAPORAN STOK BAHAN KIMIA IPA</h3>
    <p>Periode: {{ $tanggalCetak->translatedFormat('d F Y') }}</p>
</div>

<div class="info">
    <strong>IPA:</strong> {{ $idIpa }}<br>
    <strong>Tanggal Cetak:</strong>
    {{ $tanggalCetak->format('d/m/Y H:i') }}
</div>

<table>
    <thead>
        <tr>
            <th width="6%">No</th>
            <th>Nama Bahan</th>
            <th width="20%">Satuan</th>
            <th width="20%">Stok Saat Ini</th>
        </tr>
    </thead>

    <tbody>
        @forelse($stok as $item)
            <tr>
                <td class="center">{{ $loop->iteration }}</td>
                <td>{{ $item->bahan->nama_bahan ?? '-' }}</td>
                <td class="center">
                    {{ $item->bahan->satuan->nama_satuan ?? '-' }}
                </td>
                <td class="right">
                    {{ number_format((float) $item->stok, 2, ',', '.') }}
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4" class="center">
                    Tidak ada data stok bahan kimia.
                </td>
            </tr>
        @endforelse
    </tbody>
</table>

<div class="signature">
    Samarinda, {{ $tanggalCetak->translatedFormat('d F Y') }}
    <br>
    Petugas Gudang IPA
    <br><br><br><br>
    <strong>{{ auth()->user()->name }}</strong>
</div>

</body>
</html>
