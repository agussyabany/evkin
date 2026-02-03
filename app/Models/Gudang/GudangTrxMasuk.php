<?php

namespace App\Models\Gudang;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GudangTrxMasuk extends Model
{
    use HasFactory;
    protected $table = 'gudang_trx_masuk';

    protected $fillable = [
        'id_masuk',
        'id_bahan',
        'jumlah',
        'status',
        'user'
    ];

    public function bahan()
{
    return $this->belongsTo(Bahan::class, 'id_bahan');
}
}
