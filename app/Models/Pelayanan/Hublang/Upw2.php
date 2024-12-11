<?php

namespace App\Models\Pelayanan\Hublang;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Upw2 extends Model
{
    use HasFactory;
    protected $table = 'pel_upw2s';
    protected $fillable = 
    [
        
        'tumbuhPlgn2',
        'plgnTahunLl2',
        'PermohonanSL2',
        'realisasi2',
        'permohonanTunda2',
        'bulanTahun',
        'dept',
        'user'
    ];
}
