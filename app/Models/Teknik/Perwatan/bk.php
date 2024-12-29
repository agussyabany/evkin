<?php

namespace App\Models\Teknik\Perwatan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bk extends Model
{
    use HasFactory;
    protected $table = 'teknik_bks';
    protected $fillable = 
    [
        
        'jumSrvBk',
        'sendiriBk',
        'pihakTigaBk',
        'bulanTahun',
        'dept',
        'user',
        'status',
        'update',
        'tabel'
    ];
}
