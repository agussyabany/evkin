<?php

namespace App\Models\Gudang;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IpaKeluar extends Model
{
    use HasFactory;
    protected $table = 'gudang_ipa_keluar';

    protected $fillable = [
        'id_transaksi',
        'id_ipa',
        'user'
    ];
}
