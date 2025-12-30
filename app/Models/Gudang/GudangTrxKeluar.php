<?php

namespace App\Models\Gudang;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GudangTrxKeluar extends Model
{
    use HasFactory;
    protected $table = 'gudang_trx_masuk';

    protected $fillable = [
        'id_keluar',
        'id_bahan',
        'id_satuan',
        'jumlah',
        'status',
        'user'
    ];
}
