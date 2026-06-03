<?php

namespace App\Models\Ipa\Kimia;

use App\Models\Gudang\Bahan;
use App\Models\User;
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
        'user_id',
        'masuk'

    ];

    public function bahan()
    {
        return $this->belongsTo(Bahan::class, 'id_bahan');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function permintaan()
    {
        return $this->belongsTo(Permintaan::class, 'permintaan_id');
    }
}
