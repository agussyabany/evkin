<?php

namespace App\Models\Gudang;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StokIpa extends Model
{
    use HasFactory;
    protected $table = 'gudang_stok_ipa';

    protected $fillable = ['id_ipa', 'id_bahan', 'stok'];

    public function bahan()
    {
        return $this->belongsTo(Bahan::class, 'id_bahan');
    }
    
}
