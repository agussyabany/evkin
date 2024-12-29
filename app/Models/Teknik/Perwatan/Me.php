<?php

namespace App\Models\Teknik\Perwatan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Me extends Model
{
    use HasFactory;
    protected $table = 'teknik_mes';
    protected $fillable = 
    [
        
        'jumSrv',
        'sendiri',
        'pihakTiga',
        'bulanTahun',
        'dept',
        'user',
        'status',
        'update',
        'tabel'
    ];
}
