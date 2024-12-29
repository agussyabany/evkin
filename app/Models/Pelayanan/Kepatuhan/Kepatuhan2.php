<?php

namespace App\Models\Pelayanan\Kepatuhan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kepatuhan2 extends Model
{
    use HasFactory;
    protected $table = 'pel_kepatuhan2s';
    protected $fillable = 
    [
        
        'sLputus2',
        'buka2',
        'realisasiTagih2',
        'target2',
        'bulanTahun',
        'dept',
        'user',
        'status',
        'update',
        'tabel'
    ];
}
