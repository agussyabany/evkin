<?php

namespace App\Models\Utama;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengawasFisik extends Model
{
    use HasFactory;
    protected $table = 'utama_pengawasFisiks';
    protected $fillable = 
    [
        
        'pengawasan',
        'bulanTahun',
        'dept',
        'user',
        'status',
        'update',
        'tabel'
    ];
}
