<?php

namespace App\Models\Evkin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keuangan extends Model
{
    use HasFactory;
    protected $table = 'kin_keuangan';
    protected $fillable =  [
        'labaStlPjk',
        'jmlEkuitas',
        'biayaOps',
        'PndptnOps',
        'kaStrkas',
        'HutangLancar',
        'JmlPnrmRekAir',
        'jmlRekAir',
        'TotalAktiva',
        'TotalHutang',
        'bulanTahun',
        'status',
        'user'

    ];
}
