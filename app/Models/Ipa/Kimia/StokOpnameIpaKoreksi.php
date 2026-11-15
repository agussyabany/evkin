<?php

namespace App\Models;

use App\Models\Gudang\Bahan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StokOpnameIpaKoreksi extends Model
{
    protected $table = 'stok_opname_ipa_koreksi';

    protected $fillable = [
        'no_koreksi',
        'stok_opname_id',
        'id_ipa',
        'id_bahan',
        'stok_sebelum',
        'jumlah_koreksi',
        'stok_sesudah',
        'alasan',
        'user_id',
        'posted_at',
    ];

    protected $casts = [
        'stok_sebelum' => 'decimal:2',
        'jumlah_koreksi' => 'decimal:2',
        'stok_sesudah' => 'decimal:2',
        'posted_at' => 'datetime',
    ];

    public function opname(): BelongsTo
    {
        return $this->belongsTo(
            StokOpnameIpa::class,
            'stok_opname_id'
        );
    }

    public function petugas(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function bahan(): BelongsTo
    {
        return $this->belongsTo(
            Bahan::class,
            'id_bahan'
        );
    }
}