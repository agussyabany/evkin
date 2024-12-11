<?php

namespace App\Models\Pelayanan\Hublang;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Upw4 extends Model
{
    use HasFactory;
    protected $table = 'pel_upw4s';
    protected $fillable = 
    [
        
        'tumbuhPlgn4',
        'plgnTahunLl4',
        'PermohonanSL4',
        'realisasi4',
        'permohonanTunda4',
        'bulanTahun',
        'dept',
        'user',
        'status',
        'update',
        'tabel'
    ];
}
