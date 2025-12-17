<?php

namespace App\Models\Ipa;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Frekuansi extends Model
{
    use HasFactory;
    protected $table = 'frekuensi';

    protected $fillable = [
        'frek',
        'id_pompa',
        'id_ipa',
        'id_user'
    ];
}
