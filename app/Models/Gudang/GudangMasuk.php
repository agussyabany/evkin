<?php

namespace App\Models\Gudang;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GudangMasuk extends Model
{
    use HasFactory;
    protected $table = 'gudang_masuk';

    protected $fillable = [
        'no_transaksi',
        'id_truk',
        'id_ipa',
        'user'
    ];
}
