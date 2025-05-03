<?php

namespace App\Models\Teknik\Distribusi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Distribusi extends Model
{
    use HasFactory;
    protected $table = 'teknik_distribusis';
    protected $fillable = 
    [
        
        'jmlWktPelDist',
        'TekananAir',
        'plg07bar',
        'nrw',
        'AirDist',
        'airDRD',
        'aduanBocor',
        'aduabBocorSel',
        'wil',
        'bulanTahun',
        'dept',
        'user',
        'status',
        'tabel',
        'update'
    ];
}
