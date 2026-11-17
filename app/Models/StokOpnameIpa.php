<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StokOpnameIpa extends Model
{
    protected $table = 'stok_opname_ipa';

    protected $fillable = [
        'no_opname',
        'id_ipa',
        'periode',
        'tanggal_opname',
        'user_id',
        'catatan',
        'posted_at',
    ];

    protected $casts = [
        'periode' => 'date',
        'tanggal_opname' => 'datetime',
        'posted_at' => 'datetime',
    ];

    public function details(): HasMany
    {
        return $this->hasMany(
            StokOpnameIpaDetail::class,
            'stok_opname_id'
        );
    }

    public function petugas(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function koreksi(): HasMany
    {
        return $this->hasMany(
            StokOpnameIpaKoreksi::class,
            'stok_opname_id'
        );
    }
}