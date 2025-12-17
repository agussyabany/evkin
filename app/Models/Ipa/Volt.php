<?php

namespace App\Models\Ipa;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Volt extends Model
{
    use HasFactory;
    protected $table = 'volt';

    protected $fillable = [
        'vol',
        'id_pompa',
        'id_ipa',
        'id_user'
    ];
}
