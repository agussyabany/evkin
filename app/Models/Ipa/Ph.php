<?php

namespace App\Models\Ipa;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ph extends Model
{
    use HasFactory;
    protected $table = 'ph_resv';

    protected $fillable = [
        'ph',
        'id_resv',
        'id_ipa',
        'id_user'
    ];
}
