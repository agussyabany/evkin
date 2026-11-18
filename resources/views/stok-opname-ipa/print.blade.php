
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Berita Acara Stok Opname IPA</title>

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
            color: #222;
        }

        .kop {
            display: flex;
            align-items: center;
            border-bottom: 3px double #222;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }

        .logo {
            width: 75px;
            margin-right: 15px;
        }

        .kop-text {
            flex: 1;
            text-align: center;
        }

        .kop-text h2 {
            font-size: 16px;
            margin: 0 0 5px;
        }

        .kop-text p {
            margin: 2px 0;
            font-size: 11px;
        }

        h3, h4 {
            text-align: center;
            margin: 5px 0;
        }

        .info {
            width: 100%;
            margin: 20px 0;
        }

        .info td {
            padding: 4px;
            vertical-align: top;
        }

        table.data {
            width: 100%;
            border-collapse: collapse;
            margin-top: 12px;
        }

        table.data th,
        table.data td {
            border: 1px solid #333;
            padding: 7px 6px;
        }

        table.data th {
            text-align: center;
            background: #eee;
        }

        .text-center {
            text-align: center;
        }

        .text-right {
            text-align: right;
        }

        .catatan {
            margin-top: 20px;
        }

        .ttd {
            width: 100%;
            margin-top: 45px;
            text-align: center;
        }

        .ttd td {
            width: 50%;
            vertical-align: top;
            padding: 5px;
        }

        .nama-ttd {
            padding-top: 65px;
            font-weight: bold;
            text-decoration: underline;
        }

        @media screen {
            body {
                max-width: 210mm;
                margin: 20px auto;
                padding: 15px;
                background: white;
            }
        }

        @media print {
            .no-print {
                display: none !important;
            }
        }
    </style>
</head>

<body>

    <div class="no-print" style="text-align:right; margin-bottom:15px;">
        <button onclick="window.print()">Cetak / Simpan PDF</button>
    </div>

    <div class="kop">
        <img src="{{ asset('assets/img/pdam.png') }}" class="logo">

        <div class="kop-text">
            <h2>PERUMDA TIRTAKENCANA KOTA SAMARINDA</h2>
            <p>PERUSAHAAN UMUM DAERAH AIR MINUM</p>
            <p>KOTA SAMARINDA</p>
        </div>
    </div>

    <h3>BERITA ACARA STOK OPNAME BAHAN KIMIA IPA</h3>
    <h4>BERITA ACARA HASIL STOK OPNAME</h4>

    <table class="info">
        <tr>
            <td width="150">Nomor Opname</td>
            <td width="10">:</td>
            <td>{{ $opname->no_opname }}</td>
        </tr>
        <tr>
            <td>IPA</td>
            <td>:</td>
            <td>{{ $opname->id_ipa }}</td>
        </tr>
        <tr>
            <td>Periode</td>
            <td>:</td>
            <td>
                {{ \Carbon\Carbon::parse($opname->periode)->translatedFormat('F Y') }}
            </td>
        </tr>
        <tr>
            <td>Tanggal Opname</td>
            <td>:</td>
            <td>
                {{ \Carbon\Carbon::parse($opname->tanggal_opname)->format('d/m/Y H:i') }}
            </td>
        </tr>
        <tr>
            <td>Petugas</td>
            <td>:</td>
            <td>{{ $opname->nama_petugas ?? '-' }}</td>
        </tr>
        <tr>
            <td>Status</td>
            <td>:</td>
            <td>POSTED</td>
        </tr>
    </table>

    <p>
        Berdasarkan hasil pemeriksaan fisik persediaan bahan kimia,
        berikut disampaikan hasil stok opname:
    </p>

    <table class="data">
        <thead>
            <tr>
                <th width="35">No</th>
                <th>Nama Bahan Kimia</th>
                <th width="85">Stok Sistem</th>
                <th width="85">Stok Fisik</th>
                <th width="85">Selisih</th>
                <th>Keterangan</th>
            </tr>
        </thead>

        <tbody>
            @forelse($detail as $item)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td>{{ $item->nama_bahan }}</td>
                    <td class="text-right">
                        {{ number_format($item->stok_sistem, 2, ',', '.') }}
                    </td>
                    <td class="text-right">
                        {{ number_format($item->stok_fisik, 2, ',', '.') }}
                    </td>
                    <td class="text-right">
                        {{ number_format($item->selisih, 2, ',', '.') }}
                    </td>
                    <td>{{ $item->keterangan ?? '-' }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">
                        Tidak ada data stok opname.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="catatan">
        <strong>Catatan:</strong>
        <p>{{ $opname->catatan ?: '-' }}</p>
    </div>

    <table class="ttd">
        <tr>
            <td>
                Petugas Pelaksana
                <div class="nama-ttd">
                    {{ $opname->nama_petugas ?? '........................' }}
                </div>
            </td>

            <td>
                Mengetahui,<br>
                Asisten Manager IPA
                <div class="nama-ttd">
                    ................................
                </div>
            </td>
        </tr>
    </table>

</body>
</html>
