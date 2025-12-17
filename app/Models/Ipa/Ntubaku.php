<?php

namespace App\Models\Ipa;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ntubaku extends Model
{
    use HasFactory;
    protected $table = 'ntu_baku';

    protected $fillable = [
        'ntu',
        'id_resv',
        'id_ipa',
        'id_user'
    ];
}
