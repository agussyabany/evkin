<?php

namespace App\Models\Utama\PerencanaanTek;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perencanaantek extends Model
{
    use HasFactory;
    protected $table = 'utama_perencanaanteks';
    protected $fillable = 
    [
        
        'div',
        'kegiatan',
        'bulanTahun',
        'dept',
        'user' 
    ];
}
