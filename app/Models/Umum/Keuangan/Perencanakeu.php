<?php

namespace App\Models\Umum\Keuangan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perencanakeu extends Model
{
    use HasFactory;
    protected $table = 'umum_perencanakeus';
        protected $fillable = 
        [
            
            'realTerima',
            'penerimaan',
            'trgtAnggaran',
            'realDapat',
            'pendapatan',
            'reaLinvets',
            'investasi',
            'paguInvst',
            'realBiaya',
            'biaya',
            'paguBiaya',
            'bulanTahun',
            'dept',
            'user',
            'tabel',
            'status',
            'update'
        ];
}
