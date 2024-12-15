<?php

namespace App\Models\Evkin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelayanan extends Model
{
    use HasFactory;
    protected $table = 'kin_pelayanan';
    protected $fillable = [
        'JmlPnddkTrlyni',
        'jmlPndkWil',
        'kalKulasiJmlPlgn',
        'JmlPlgnThLl',
        'AduanSlsai',
        'JmlAduan',
        'UjiKualitas',
        'titikUji',
        'JmlAirTrjualDom',
        'JmlPlgnDom',
        'bulanTahun',
        'status',
        'user'
    ];
}
