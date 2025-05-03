<?php

namespace App\Models\Umum\Sdm;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diklat extends Model
{
    use HasFactory;
    protected $table = 'sdm_diklats';
    protected $fillable = 
    [
        
        'jumlahPeg',
        'PegDiklat',
        'realBiayaDiklt',
        'RealBiayaPeg',
        'pegTtp',
        'honor',
        'p3k',
        'bulanTahun',
        'dept',
        'user'
    ];
}
