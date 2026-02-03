<?php

namespace App\Models\Ipa\Kimia;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StokLog extends Model
{
    use HasFactory;
    protected $table = 'gudang_stok_log';
    protected $fillable = [
        'id_bahan',
        'awal',
        'keluar',
        'akhir',
        'permintaan_id',
        'user_id'

    ];
}
