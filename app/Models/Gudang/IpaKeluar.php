<?php

namespace App\Models\Gudang;

use App\Models\Ipa;
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

   public function detail()
    {
        return $this->hasMany(
            IpaTrxKeluar::class,
            'id_transaksi',
            'id_transaksi'
        );
    }

     public function ipa()
    {
        return $this->belongsTo(
            Ipa::class,
            'id_ipa'
        );
    }
}
