<?php

namespace App\Models\Pelayanan\Hublang;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gis extends Model
{
    use HasFactory;
    protected $table = 'pel_gis';
    protected $fillable = 
    [
        
        'digitasiSl',
        'digiatsiPipa',
        'bulanTahun',
        'dept',
        'user'
    ];
}
