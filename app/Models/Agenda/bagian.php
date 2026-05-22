<?php

namespace App\Models\Agenda;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bagian extends Model
{
    use HasFactory;
    protected $table = 'bagian';
     protected $fillable = [
        'nama_bagian'
    ];
}
