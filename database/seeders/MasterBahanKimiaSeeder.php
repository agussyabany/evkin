<?php

namespace Database\Seeders;

use App\Models\Gudang\Bahan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MasterBahanKimiaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            // TAWAS
            [
                'nama_bahan' => 'Tawas',
                'id_satuan' => 2, // sak
                'ukuran' => 25,
            ],

            // SODA ASH
            [
                'nama_bahan' => 'Soda Ash',
                'id_satuan' => 2, // sak
                'ukuran' => 50,
            ],

            // KAPORIT
            [
                'nama_bahan' => 'Kaporit',
                'id_satuan' => 3, // pail
                'ukuran' => 15,
            ],

            // KAOLIN
            [
                'nama_bahan' => 'Kaolin',
                'id_satuan' => 2, // sak
                'ukuran' => 40,
            ],

            // POLY ELECTROLITE
            [
                'nama_bahan' => 'Poly Electrolite 15kg',
                'id_satuan' => 3, // pail
                'ukuran' => 15,
            ],
            [
                'nama_bahan' => 'Poly Electrolite 25kg',
                'id_satuan' => 2, // sak
                'ukuran' => 25,
            ],
            [
                'nama_bahan' => 'Poly Electrolite 30Kg',
                'id_satuan' => 2, // sak
                'ukuran' => 30,
            ],
        ];

        foreach ($data as $item) {
            Bahan::insert([
                'nama_bahan' => $item['nama_bahan'],
                'id_satuan' => $item['id_satuan'],
                'ukuran' => $item['ukuran'],
                'stok_minim' => 0,
                'stok_min_ipa' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

    }
}
