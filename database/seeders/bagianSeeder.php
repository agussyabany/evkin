<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Agenda\bagian;

class bagianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $divisions = [

            'Pengawasan Adm & Keuangan',
            'Pengawasan Teknik',
            'Diklat',
            'Personalia',
            'Humas',
            'Pengadaan',
            'Hukum dan Keamanan',
            'Informasi dan Teknologi',
            'Perencanaan Keuangan',
            'Akuntansi',
            'Kas',
            'Aset',
            'Rekening',

            'Meter dan Pelayanan Wilayah I',
            'Meter dan Pelayanan Wilayah II',
            'Meter dan Pelayanan Wilayah III',
            'Meter dan Pelayanan Wilayah IV',
            'Akurasi dan Meter Air',

            'Kepatuhan Pelanggan Wilayah I',
            'Kepatuhan Pelanggan Wilayah II',
            'Kepatuhan Pelanggan Wilayah III',
            'Kepatuhan Pelanggan Wilayah IV',

            'Perencanaan Teknik',
            'Pengawasan Fisik',
            'Laboratorium Induk',

            'Operator Intake, IPA dan Lab Cendana',
            'Operator Intake, IPA dan Lab Tirta Kencana',
            'Operator Intake, IPA dan Lab Samarinda Seberang',
            'Operator Intake, IPA dan Lab Selili',
            'Operator Intake, IPA dan Lab Bengkuring dan Bumi Sempaja',
            'Operator Intake, IPA dan Lab Gunung Lingai dan Pampang',
            'Operator Intake, IPA dan Lab Sungai Kapih',
            'Operator IPA Bendang',

            'Distribusi dan PKA Wilayah I',
            'Distribusi dan PKA Wilayah II',
            'Distribusi dan PKA Wilayah III',
            'Distribusi dan PKA Wilayah IV',

            'Perawatan Mekanikal, Elektrikal dan Bengkel',
            'Perawatan Bangunan, Gedung dan Inventaris Kantor',
            'Tata Usaha',

            'Penagihan Loket Tirta Kencana',
            'Penagihan Loket Merdeka',
            'Penagihan Loket Perumnas',
            'Rekening/Loket Pembayaran Karpotek',

            'Operator Intake, IPA dan Lab Palaran, Bukuan & Bantuas',
            'Operator Intake, IPA dan Lab Gunung Lipan',
            'Operator Intake, IPA dan Lab Loa Bakung',
            'Operator Intake, IPA dan Lab Pulau Atas dan Makroman',
            'Operator Intake, IPA dan Lab Kalhol',
            'Intake, IPA dan Lab Bendang',

            'GIS DAN ANALISA JARINGAN',
            'Gudang',
            'Kepegawaian',
            'Penelitian',
            'Agent Contact Center',
            'Usaha Bisnis',
            'Kerja Sama',
            'Tata Kelola',

            'Sekretaris Dewan Pengawas',
            'Sekretaris Direktur Utama',
            'Sekretaris Direktur Umum',
            'Sekretaris Direktur Teknik',
            'Sekretaris Direktur Pelayanan',

            'Koordinator Pembaca Meter Wilayah I',
            'Koordinator Pembaca Meter Wilayah II',
            'Koordinator Pembaca Meter Wilayah III',
            'Koordinator Pembaca Meter Wilayah IV',

            'Rekening/Adm Manajer Hubungan Pelanggan',
            'PBK IPA Bengkuring',

            'Adm Kepatuhan Pelanggan Wilayah I',
            'Adm Kepatuhan Pelanggan Wilayah II',
            'Adm Kepatuhan Pelanggan Wilayah III',
            'Adm Kepatuhan Pelanggan Wilayah IV',

            'Koordinator Contact Center',
            'Adm Informasi dan Teknologi',
            'Adm Pengadaan',
            'LPSE',

            'Penagihan Loket Keliling',
            'Gudang (Sopir Kendaraan Operasional)',
            'Adm Manajer Distribusi dan PKA',
            'Adm Distribusi dan PKA Wil I',
            'Adm Distribusi dan PKA Wil II',
            'Adm Distribusi dan PKA Wil III',
            'Adm Distribusi dan PKA Wil IV',

            'Adm Perawatan Mekanikal, Elektrikal dan Bengkel/Staf Adm Manajer Perawatan',
            'Adm Perawatan Mekanikal, Elektrikal dan Bengkel',

            'Penyelam',
            'Bengkel',

            'Adm Perawatan Bangunan, Gedung dan Inventaris Kantor',

            'Koordinator Penagihan Loket Tirta Kencana',
            'Koordinator Penagihan Loket Merdeka',
            'Koordinator Penagihan Loket Perumnas',
            'Koordinator Penagihan Loket Smd Seberang',
            'Penagihan Loket Smd Seberang',
            'Koordinator Penagihan Loket Alaya',
            'Penagihan Loket Alaya',

            'Adm Pembaca Meter Wil I',
            'Adm Pembaca Meter Wil II',
            'Adm Pembaca Meter Wil III',
            'Adm Pembaca Meter Wil IV',

            'CS Pelayanan Pelanggan Wil I',
            'CS Pelayanan Pelanggan Wil II',
            'CS Pelayanan Pelanggan Wil III',
            'CS Pelayanan Pelanggan Wil IV',

            'Adm Pelayanan Pelanggan Wil I',
            'Adm Pelayanan Pelanggan Wil II',
            'Adm Pelayanan Pelanggan Wil III',
            'Adm Pelayanan Pelanggan Wil IV',

            'Pelayanan Pelanggan Wil I',
            'Pelayanan Pelanggan Wil II',
            'Pelayanan Pelanggan Wil III',
            'Pelayanan Pelanggan Wil IV',

            'Adm Akurasi Meter Air',
            'Adm GIS dan Analisa Jaringan',

            'Adm Kepatuhan Pelanggan Wil I / Adm Manajer Kepatuhan Pelanggan',
            'Adm Kepatuhan Pelanggan Wil I',
            'Adm Kepatuhan Pelanggan Wil II',
            'Adm Kepatuhan Pelanggan Wil III',
            'Adm Kepatuhan Pelanggan Wil IV',

            'Loket Mall Pelayanan Publik',
            'Personalia dan Bendahara Gaji',

            'SDM',
            'HUBUNGAN LANGGANAN',
            'KERJASAMA DAN USAHA BISNIS',
            'PERAWATAN',
            'KEPATUHAN PELANGGAN',
            'KEUANGAN',
            'PRODUKSI',
            'SATUAN PENGAWAS INTERNAL',

            'Distribusi Dan Pengendalian Kehlangan Air',
            'Koordinator Mobil Tangki',

            'UMUM',
            'KOPERASI',

            'PEMBACA METER WILAYAH 1',
            'PEMBACA METER WILAYAH 2',
            'PEMBACA METER WILAYAH 3',
            'PEMBACA METER WILAYAH 4',

            'MANAJER PEMBACA METER',
            'ADMIN PEMBACA METER',
            'ADMIN CHEKER',

            'AKAINDO',
            'SEKERTARIS PERUSAHAAN',
            'KESEKRETARIATAN',

        ];

        foreach ($divisions as $division) {
            bagian::create([
                'nama_bagian' => $division
            ]);
        }
    }
}
