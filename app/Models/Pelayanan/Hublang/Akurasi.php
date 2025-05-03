<?php

namespace App\Models\Pelayanan\Hublang;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Akurasi extends Model
{
    use HasFactory;
    protected $table = 'pel_akurasis';
    protected $fillable = 
    [
        
        'kalibrasi',
        'gantiMtr',
        'bulanTahun',
        'dept',
        'user',
        'status',
        'update',
        'tabel',
        'evkin'
    ];
}
