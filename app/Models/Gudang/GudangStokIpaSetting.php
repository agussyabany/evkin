<?php

namespace App\Models\Gudang;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GudangStokIpaSetting extends Model
{
    use HasFactory;
     protected $table = 'gudang_stok_ipa_setting';

    protected $fillable = [
        'id_ipa',
        'id_bahan',
        'stok_minimum',
    ];

    protected $casts = [
        'stok_minimum' => 'decimal:2',
    ];
}
