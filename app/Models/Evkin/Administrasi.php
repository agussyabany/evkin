<?php

namespace App\Models\Evkin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Administrasi extends Model
{
    use HasFactory;
    protected $table = 'kin_administrasis';
    protected $fillable = [
        'rjp',
        'pos',
        'rpkk',
        'rkap',
        'bulanTahun',
         'status',
        'user'

    ];
}
