<?php

namespace App\Models\Ipa;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chlor extends Model
{
    use HasFactory;
    protected $table = 'clor_resv';

    protected $fillable = [
        'clor',
        'id_resv',
        'id_ipa',
        'id_user'
    ];
}
