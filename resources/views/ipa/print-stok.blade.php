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
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 90px;
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
            text-align: center;
            width: 100%;
        }

        .header-text h2 {
            font-size: 16px;
            font-weight: bold;
            margin: 0 0 5px;
        }

        .header-text h3 {
            font-size: 12px;
            margin: 5px 0;
        }

        .header-text p {
            font-size: 10px;
            margin: 5px 0 0;
        }

        .info {
            margin-bottom: 15px;
            line-height: 1.8;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
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
        <img src="{{ asset('assets/img/pdam.png') }}" alt="Logo Perumda" class="logo-perumda">

        <div class="header-text">
            <h2>PERUMDA TIRTAKENCANA KOTA SAMARINDA</h2>
            <h3>LAPORAN STOK BAHAN KIMIA IPA</h3>
            <p>Periode: {{ $tanggalCetak->translatedFormat('d F Y') }}</p>
        </div>
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
