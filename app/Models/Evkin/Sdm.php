<?php

namespace App\Models\Evkin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sdm extends Model
{
    use HasFactory;
    protected $table = 'kin_sdm';
    protected $fillable = [
        'JmlPgwai',
        'JmlPlgn1000',
        'JmlPegDiklat',
        'RealByDiklat',
        'RealByPeg',
        'bulanTahun',
        'status',
        'user'
    ];
}
