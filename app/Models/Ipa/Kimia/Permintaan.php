<?php

namespace App\Models\Ipa\Kimia;

use App\Models\Ipa;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permintaan extends Model
{
    use HasFactory;
    protected $table = 'gudang_permintaan';
    protected $fillable = [
        'no_permintaan',
        'id_ipa',
        'user_id',
        'status'
    ];

    public function details()
    {
        return $this->hasMany(PermintaanDetail::class);
    }

    /* 🔗 STATUS PERMINTAAN */
    public function statusRelasi()
    {
        return $this->belongsTo(Status::class, 'status');
    }

    /* 🔗 LOG PERMINTAAN */
    public function logs()
    {
        return $this->hasMany(PermintaanLog::class, 'permintaan_id');
    }

    /* user pembuat */
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
