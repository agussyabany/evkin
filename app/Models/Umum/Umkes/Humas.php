<?php

namespace App\Models\Umum\Umkes;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Humas extends Model
{
    use HasFactory;
        protected $table = 'umum_humas';
        protected $fillable = 
        [
            
            'aduanCC',
            'bulanTahun',
            'dept',
            'user'
        ];
}
