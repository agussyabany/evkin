<?php

namespace App\Models\Ipa\Kimia;

use App\Models\Gudang\Bahan;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermintaanDetail extends Model
{
    use HasFactory;
    protected $table = 'gudang_permintaan_detail';
    protected $fillable = [
        'permintaan_id',
        'id_bahan',
        'qty',
        'real',
        'ket'
    ];

    public function bahan()
    {
        return $this->belongsTo(Bahan::class, 'id_bahan');
    }
}
