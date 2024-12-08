<?php

namespace App\Models\Pelayanan\Hublang;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Upw extends Model
{
    use HasFactory;
    protected $table = 'pel_upws';
    protected $fillable = 
    [
        
        'tumbuhPlgn',
        'plgnTahunLl',
        'PermohonanSL',
        'realisasi',
        'permohonanTunda',
        'upw',
        'bulanTahun',
        'dept',
        'user'
    ];
}
