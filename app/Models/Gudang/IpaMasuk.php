<?php

namespace App\Models\Gudang;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IpaMasuk extends Model
{
    use HasFactory;
    protected $table = 'gudang_ipa_masuk';

    protected $fillable = [
        'id_transaksi',
        'id_ipa',
        'id_truk',
        'pengirim',
        'user'
    ];
}
