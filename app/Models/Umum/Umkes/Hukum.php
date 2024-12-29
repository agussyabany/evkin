<?php

namespace App\Models\Umum\Umkes;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hukum extends Model
{
    use HasFactory;
    protected $table = 'umum_hukums';
    protected $fillable = 
    [
        
        'produkHukum',
        'bulanTahun',
        'dept',
        'user'
    ];
}
