<?php

namespace App\Models\Ipa\Kimia;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;
    protected $table = 'gudang_status';

    protected $fillable = ['nama_status'];

    /* relasi ke permintaan */
    public function permintaan()
    {
        return $this->hasMany(Permintaan::class, 'status');
    }

    /* relasi ke log */
    public function logs()
    {
        return $this->hasMany(PermintaanLog::class, 'status');
    }
}
