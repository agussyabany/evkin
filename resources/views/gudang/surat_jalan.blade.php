<!DOCTYPE html>
<html>
<head>
    <style>
         body { font-family: DejaVu Sans, sans-serif; font-size: 11px; }
        .kop { text-align: center; }
        /* .kop img { position: absolute; left: 40px; top: 20px; width: 70px; } */
        hr { border: 1px solid #000; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #000; padding: 4px; }
        .kop-wrapper {
    position: relative;
    width: 100%;
    height: 90px;
    margin-bottom: 5px;
}

.logo {
    position: absolute;
    top: -10px;          /* ⬅️ INI KUNCI NAIKIN LOGO */
    left: 0;
    width: 80px;
}

.kop-text {
    text-align: center;
    line-height: 1.2;
}

.kop-text h3 {
    margin: 0;
    font-size: 16px;
    font-weight: bold;
}

.kop-line {
    border: 1px solid #000;
    margin-top: 5px;
}

.judul {
    text-align: center;
    margin-top: 10px;
    font-size: 14px;
}



.ttd-table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 40px;
        font-size: 12px;
    }

    .ttd-table td {
        border: 1px solid #000;
        text-align: center;
        vertical-align: top;
        padding: 6px;
        height: 140px;
    }

    .ttd-title {
        font-weight: bold;
        margin-bottom: 6px;
    }

    .ttd-name {
        margin-top: 70px;
        display: inline-block;
        padding-bottom: 2px;
        border-bottom: 1px solid #000;
        min-width: 140px;
    }

    .ttd-img {
        height: 60px;
        margin-top: 10px;
    }

    </style>
</head>
<body>

<div class="kop-wrapper">
    <img src="{{ public_path('assets/img/pdam.png') }}" class="logo">

    <div class="kop-text">
        <h3>PERUMDAM TIRTA KENCANA</h3>
        <strong>KOTA SAMARINDA</strong><br>
        Jl. Cendana
    </div>
</div>

<hr class="kop-line">

<h4 class="judul">SURAT JALAN BAHAN KIMIA</h4>

<table>
    <tr>
        <td width="20%">No Permintaan</td>
        <td>{{ $permintaan->no_permintaan }}</td>
        <td width="20%">Tanggal</td>
        <td>{{ $permintaan->created_at->format('d-m-Y') }}</td>
    </tr>
    <tr>
        <td>IPA Tujuan</td>
        <td colspan="3">{{ $permintaan->ipa->nama_ipa }}</td>
    </tr>
</table>

<br>

<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Bahan</th>
            <th>Qty</th>
            <th>Satuan</th>
            <th>Kg</th>
            <th>Keterangan</th>
        </tr>
    </thead>
    <tbody>
        @foreach($permintaan->details as $d)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $d->bahan->nama_bahan }}</td>
            <td>{{ $d->real }}</td>
            <td>{{ $d->bahan->satuan->nama_satuan }}</td>
            <td>{{ $d->real * $d->bahan->ukuran }}</td>
            <td>{{ $d->ket }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

<br><br>

<table width="100%" style="margin-top:60px; text-align:center;">
    <tr>
    {{-- ASMEN IPA --}}
    <td width="33%" align="center">
        Diajuakan,<br>
        Asisten Manajer IPA<br>
        <small>({{ $asmenIpa->ipa->nama_ipa ?? '-' }})</small>
        <br><br><br>
        <strong style="text-decoration:underline;">
            {{ $asmenIpa->user->name ?? '-' }}
        </strong>
    </td>

    {{-- ASMEN GUDANG --}}
    <td width="33%" align="center">
        Disetujui,<br>
        Asisten Manajer Gudang<br><br><br>
        <strong style="text-decoration:underline;">
            {{ $asmenGudang->user->name ?? '-' }}
        </strong>
    </td>

    {{-- PETUGAS GUDANG --}}
    <td width="33%" align="center">
        Dikeluarkan,<br>
        Petugas Gudang<br><br><br>
        <strong style="text-decoration:underline;">
            {{ $petugasGudang->user->name ?? '-' }}
        </strong>
    </td>
</tr>
</table>

</body>
</html>
