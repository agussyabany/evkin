<?php

namespace App\Models\Teknik\Perawatan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perawatan extends Model
{
    use HasFactory;
    protected $table = 'teknik_perawatans';
    protected $fillable = 
    [
        
        'jumSrv',
        'sendiri',
        'pihakTiga',
        'div',
        'bulanTahun',
        'dept',
        'user'
    ];
}
