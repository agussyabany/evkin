<?php

namespace App\Models\Umum\Keuangan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aset extends Model
{
    use HasFactory;
    protected $table = 'umum_asets';
    protected $fillable = 
    [
        
        'totalAset',
        'realAsetTtp',
        'serahKelola',
        'serahTerima',
        'bulanTahun',
        'dept',
        'user'
    ];
}
