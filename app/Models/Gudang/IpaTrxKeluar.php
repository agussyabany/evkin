<?php

namespace App\Models\Gudang;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IpaTrxKeluar extends Model
{
    use HasFactory;
     protected $table = 'gudang_ipatrx_keluar';

    protected $fillable = [
        'id_transaksi',
        'id_bahan',
        'id_satuan',
        'jumlah',
        'id_ipa',
        'user'
    ];
}
