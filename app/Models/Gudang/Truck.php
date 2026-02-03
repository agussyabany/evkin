<?php

namespace App\Models\Gudang;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Truck extends Model
{
    use HasFactory;
    
    protected $table = 'gudang_truck';

    protected $fillable = [
        'nama_truck',
        'nopol',
    ];
}
