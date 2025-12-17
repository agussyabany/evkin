<?php

namespace App\Models\Ipa;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mano extends Model
{
    use HasFactory;
    protected $table = 'mano';

    protected $fillable = [
        'mano',
        'id_pompa',
        'id_ipa',
        'id_user'
    ];
}
