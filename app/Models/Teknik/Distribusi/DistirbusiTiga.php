<?php

namespace App\Models\Teknik\Distribusi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DistirbusiTiga extends Model
{
    use HasFactory;
    protected $table = 'teknik_ditirbusiTiga';
    protected $fillable = 
    [
        
        'jmlWktPelDist3',
        'TekananAir3',
        'plg07bar3',
        'nrw3',
        'AirDist3',
        'airDRD3',
        'aduanBocor3',
        'aduabBocorSel3',
        'bulanTahun',
        'update',
        'status',
        'dept',
        'user',
        'status',
        'tabel',
        'update'
    ];
}
