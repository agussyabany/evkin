<?php

namespace App\Models\Gudang;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bahan extends Model
{
    use HasFactory;
    protected $table = 'gudang_bahan';

    protected $fillable = [
        'nama_bahan',
        'id_satuan',
        'ukuran',
        'stok_minim'
    ];

        public function satuan()
    {
        return $this->belongsTo(Satuan::class, 'id_satuan');
    }

     // 🔥 STOK GUDANG UTAMA
    public function stokGudang()
    {
        return $this->hasOne(Stok::class, 'id_bahan', 'id');
    }
}
