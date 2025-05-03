<?php

namespace App\Models\Pelayanan\Kepatuhan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kepatuhan3 extends Model
{
    use HasFactory;
    protected $table = 'pel_kepatuhan3s';
    protected $fillable = 
    [
        
        'sLputus3',
        'buka3',
        'realisasiTagih3',
        'target3',
        'bulanTahun',
        'dept',
        'user',
        'status',
        'update',
        'tabel'
    ];
}
