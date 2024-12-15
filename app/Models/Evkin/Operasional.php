<?php

namespace App\Models\Evkin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Operasional extends Model
{
    use HasFactory;
    protected $table = 'kin_operasional';

    protected $fillable = [
        'VolProdRil',
        'KalkulasiJumAir',
        'KpstsTrpsng',
        'terDistirbusi',
        'JmlAirDist',
        'JmlWktPly',
        'Plgnlayan',
        'PlgnAktiv',
        'MtrAirGnti',
        'bulanTahun',
        'status',
        'user'
    ];
}
