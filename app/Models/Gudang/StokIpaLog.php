<?php

namespace App\Models\Gudang;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StokIpaLog extends Model
{
    use HasFactory;

    protected $table = 'gudang_stok_ipa_log';

    protected $fillable = [
        'id_ipa',
        'id_bahan',
        'jenis',
        'awal',
        'jumlah',
        'akhir',
        'id_transaksi',
        'user_id',
    ];

    public function bahan()
    {
        return $this->belongsTo(Bahan::class, 'id_bahan');
    }

    public function userRelasi()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
