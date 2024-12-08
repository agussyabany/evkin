<?php

namespace App\Models\Teknik\Produksi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produksi extends Model
{
    use HasFactory;
    protected $table = 'teknik_produksis';
    protected $fillable = 
    [
        
        'kapsTerpasang',
        'VolProduksi',
        'volAirbaku',
        'kualitasAir',
        'ttkUji',
        'ttkUjiSyarat',
        'bulanTahun',
        'dept',
        'user'
    ];
}
