<?php

namespace App\Models\Ipa\Kimia;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GudangPermintaanKeterangan extends Model
{
    use HasFactory;
    protected $table = 'gudang_permintaan_keterangan';

    protected $fillable = [
        'permintaan_detail_id',
        'sumber',
        'kondisi',
        'qty',
        'keterangan',
        'user_id'
    ];
}
