<?php

namespace App\Models\Ipa;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Amper extends Model
{
    use HasFactory;
    protected $table = 'amper';

    protected $fillable = [
        'amp',
        'id_pompa',
        'id_ipa',
        'id_user'
    ];
}
