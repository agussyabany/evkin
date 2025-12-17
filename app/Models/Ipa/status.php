<?php

namespace App\Models\Ipa;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class status extends Model
{
    use HasFactory;
    protected $table = 'status';

    protected $fillable = [
        'status',
        'id_pompa',
        'id_ipa',
        'id_user'
    ];
}
