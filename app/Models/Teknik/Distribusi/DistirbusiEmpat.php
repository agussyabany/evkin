<?php

namespace App\Models\Teknik\Distribusi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DistirbusiEmpat extends Model
{
    use HasFactory;
    protected $table = 'teknik_ditirbusiEmpat';
    protected $fillable = 
    [
        
        'jmlWktPelDist4',
        'TekananAir4',
        'plg07bar4',
        'nrw4',
        'AirDist4',
        'airDRD4',
        'aduanBocor4',
        'aduabBocorSel4',
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
