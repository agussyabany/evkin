<?php

namespace App\Models\Pelayanan\Hublang;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rekening extends Model
{
    use HasFactory;
    protected $table = 'pel_rekenings';
    protected $fillable = 
    [
        
        'efesTag',
        'drd',
        'JmlAirDom',
        'PlgnDom',
        'jmlAirTerjual',
        'efekTagih',
        'terimaAir',
        'jumRekAir',
        'bulanTahun',
        'dept',
        'user',
        'status',
        'update',
        'tabel',
        'evkin',
        'jmlPlgn'
    ];
}
