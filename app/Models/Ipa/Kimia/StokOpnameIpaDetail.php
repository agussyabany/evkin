<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StokOpnameIpaDetail extends Model
{
    protected $table = 'stok_opname_ipa_detail';

    protected $fillable = [
        'stok_opname_id',
        'id_bahan',
        'stok_sistem',
        'stok_fisik',
        'selisih',
        'keterangan',
    ];

    protected $casts = [
        'stok_sistem' => 'decimal:2',
        'stok_fisik' => 'decimal:2',
        'selisih' => 'decimal:2',
    ];

    public function opname(): BelongsTo
    {
        return $this->belongsTo(
            StokOpnameIpa::class,
            'stok_opname_id'
        );
    }

    public function bahan(): BelongsTo
    {
        return $this->belongsTo(
            GudangBahan::class,
            'id_bahan'
        );
    }
}