<?php

namespace App\Models\Ipa;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cucifilter extends Model
{
    use HasFactory;
    protected $table = 'cuci_filter';

    protected $fillable = [
        'menit',
        'id_filter',
        'id_ipa',
        'user'
    ];
}
