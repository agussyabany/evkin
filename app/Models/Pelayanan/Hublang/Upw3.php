<?php

namespace App\Models\Pelayanan\Hublang;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Upw3 extends Model
{
    use HasFactory;
    protected $table = 'pel_upw3s';
    protected $fillable = 
    [
        
        'tumbuhPlgn3',
        'plgnTahunLl3',
        'PermohonanSL3',
        'realisasi3',
        'permohonanTunda3',
        'bulanTahun',
        'dept',
        'user',
        'status',
        'update',
        'tabel'
    ];
}
