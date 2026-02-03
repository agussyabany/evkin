<?php

namespace App\Models\Gudang;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stok extends Model
{
    use HasFactory;
    protected $table = 'gudang_stok';

    protected $fillable = [
        'id_bahan',
        'stok'
    ];

    public function bahan()
    {
        return $this->belongsTo(Bahan::class, 'id_bahan');
    }
}
