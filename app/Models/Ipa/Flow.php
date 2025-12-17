<?php

namespace App\Models\Ipa;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flow extends Model
{
    use HasFactory;
    protected $table = 'flow';

    protected $fillable = [
        'flow',
        'totaliz',
        'id_flow',
        'id_ipa',
        'id_user'
    ];
}
