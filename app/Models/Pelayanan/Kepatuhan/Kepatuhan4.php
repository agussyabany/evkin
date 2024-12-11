<?php

namespace App\Models\Pelayanan\Kepatuhan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kepatuhan4 extends Model
{
    use HasFactory;
    protected $table = 'pel_kepatuhan4s';
    protected $fillable = 
    [
        
        'sLputus4',
        'buka4',
        'realisasiTagih4',
        'target4',
        'bulanTahun',
        'dept',
        'user',
        'status',
        'update',
        'tabel'
    ];
}
