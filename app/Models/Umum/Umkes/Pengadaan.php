<?php

namespace App\Models\Umum\Umkes;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengadaan extends Model
{
    use HasFactory;
    protected $table = 'umum_pengadaans';
    protected $fillable = 
    [
        
        'beliLangsung',
        'adaLangsung',
        'kontrak',
        'bulanTahun',
        'dept',
        'user'
    ];
}
