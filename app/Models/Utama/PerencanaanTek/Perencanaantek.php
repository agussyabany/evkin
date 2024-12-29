<?php

namespace App\Models\Utama\PerencanaanTek;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perencanaantek extends Model
{
    use HasFactory;
    protected $table = 'utama_perenctknk';
    protected $fillable = 
    [
        
        'rab',
        'bulanTahun',
        'dept',
        'user',
        'status',
        'update',
        'tabel'
    ];
}
