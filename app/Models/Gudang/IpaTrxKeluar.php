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

    public function bahan()
    {
        return $this->belongsTo(
            Bahan::class,
            'id_bahan'
        );
    }

     public function satuan()
    {
        return $this->belongsTo(
            Satuan::class,
            'id_satuan'
        );
    }

    public function transaksi()
    {
        return $this->belongsTo(
            IpaKeluar::class,
            'id_transaksi',
            'id_transaksi'
        );
    }
}
