<?php

namespace App\Models\Umum\Keuangan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Akutansi extends Model
{
    use HasFactory;
        protected $table = 'umum_akutansis';
        protected $fillable = 
        [
            
            'labaStPjk',
            'JmllEkuitas',
            'biayaOpr',
            'pendapatanOpr',
            'kasSetKas',
            'HtgLancar',
            'solvabilitas',
            'ttlAktiva',
            'ttlHutang',
            'SaldoPiutang',
            'labaBerjalan',
            'bulanTahun',
            'dept',
            'user',
            'tabel',
            'update',
            'evkin'
        ];
}
