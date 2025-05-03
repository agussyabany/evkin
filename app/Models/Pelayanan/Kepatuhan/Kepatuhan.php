<?php

namespace App\Models\Pelayanan\Kepatuhan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kepatuhan extends Model
{
    use HasFactory;
    protected $table = 'pel_kepatuhans';
    protected $fillable = 
    [
        
        'sLputus',
        'buka',
        'realisasiTagih',
        'target',
        'bulanTahun',
        'dept',
        'user'
    ];
}
