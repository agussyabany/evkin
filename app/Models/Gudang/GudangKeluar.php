<?php

namespace App\Models\Gudang;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GudangKeluar extends Model
{
    use HasFactory;
    protected $table = 'gudang_keluars';

    protected $fillable = [
        'no_transaksi',
        'id_truk',
        'id_ipa',
        'penerima',
        'deliver',
        'user'
    ];
}
