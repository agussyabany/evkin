<?php

namespace App\Models\Umum\Umkes;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class It extends Model
{
    use HasFactory;
    protected $table = 'umum_its';
    protected $fillable = 
    [
        
        'AplGuna',
        'service',
        'bulanTahun',
        'dept',
        'user'
    ];
}
