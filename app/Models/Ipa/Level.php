<?php

namespace App\Models\Ipa;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    use HasFactory;
    protected $table = 'level';

    protected $fillable = [
        'lvl',
        'id_resv',
        'id_ipa',
        'id_user'
    ];
}
