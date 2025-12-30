<?php

namespace App\Models\Ipa\Kimia;

use App\Models\Ipa;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermintaanLog extends Model
{
    use HasFactory;
     protected $table = 'gudang_permintaan_log';
    protected $fillable = [
        'permintaan_id',
        'status',
        'user_id',
        'id_ipa',
        'id_jabatan'

    ];

    /* 🔗 PERMINTAAN */
    public function permintaan()
    {
        return $this->belongsTo(Permintaan::class, 'permintaan_id');
    }

    /* 🔗 STATUS LOG */
    public function statusRelasi()
    {
        return $this->belongsTo(Status::class, 'status');
    }

    /* user yang aksi */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /* IPA */
    public function ipa()
    {
        return $this->belongsTo(Ipa::class, 'id_ipa');
    }
}
