<?php

namespace App\Models\Ipa;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Durasi extends Model
{
    use HasFactory;
    protected $table = 'durasi';

    protected $fillable = [
        'durasi',
        'id_pompa',
        'id_ipa',
        'id_user'
    ];
}
