<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ipa extends Model
{
    use HasFactory;
    protected $table = 'ipas';

    protected $fillable = [
        'nama_ipa',
        'alamat',
        'pompa',
        'jalur',
        'reservoar'
    ];
}
