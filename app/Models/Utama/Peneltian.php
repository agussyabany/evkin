<?php

namespace App\Models\Utama;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peneltian extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $table = 'peneltians';
    protected $fillable = 
    [
        
        'data',
        'bulanTahun',
        'dept',
        'user',
        'status',
        'update',
        'tabel'
    ];
}
