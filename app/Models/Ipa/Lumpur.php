<?php

namespace App\Models\Ipa;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lumpur extends Model
{
    use HasFactory;
    protected $table = 'lumpur';

    protected $fillable = [
        'menit',
        'ipa_lumpur',
        'id_ipa',
        'user'
    ];
}
