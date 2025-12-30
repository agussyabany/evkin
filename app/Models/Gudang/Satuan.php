<?php

namespace App\Models\Gudang;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Satuan extends Model
{
    use HasFactory;
    protected $table = 'gudang_satuan';

    protected $fillable = [
        'nama_satuan',
        'ukuran',
    ];

   
}
