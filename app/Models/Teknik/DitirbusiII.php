<?php

namespace App\Models\Teknik;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DitirbusiII extends Model
{
    use HasFactory;

    protected $table = 'ditirbusiDua';
    protected $fillable = 
    [
        
        'jmlWktPelDist2',
        'TekananAir2',
        'plg07bar2',
        'nrw2',
        'AirDist2',
        'airDRD2',
        'aduanBocor2',
        'aduabBocorSel2',
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
