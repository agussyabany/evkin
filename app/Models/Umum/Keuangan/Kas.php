<?php

namespace App\Models\Umum\Keuangan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kas extends Model
{
    use HasFactory;
    protected $table = 'umum_kas';
    protected $fillable = 
    [
        
        'saldoKasBank',
        'terimaHarian',
        'keluarHarian',
        'bulanTahun',
        'dept',
        'user'
    ];
}
