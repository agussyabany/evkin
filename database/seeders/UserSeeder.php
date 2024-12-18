<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    //     $dewas = User::create(
    //         [
    //            'name' => 'dewas',
    //            'email' => 'dewas@evkin.smd',
    //            'password' => bcrypt('samarinda@2024')
    //        ]
    //    );
    //    $dewas->assignRole('de-was');

//     $adminUtama = User::create(
//         [
//            'name' => 'Admin Utama',
//            'email' => 'adminUtama@evkin.smd',
//            'password' => bcrypt('samarinda@2024')
//        ]
//    );
//    $adminUtama->assignRole('adminUtama');

        // $adminUtama = User::create(
        //     [
        //     'name' => 'Direktur Utama',
        //     'email' => 'dirut@evkin.smd',
        //     'password' => bcrypt('samarinda@2024')
        // ]
        // );
        // $adminUtama->assignRole('dirut');
        // $dirum = User::create(
        //     [
        //     'name' => 'Direktur Umum',
        //     'email' => 'dirum@evkin.smd',
        //     'password' => bcrypt('samarinda@2024')
        // ]
        // );
        // $dirum->assignRole('dirut');

        // $dirtek = User::create(
        //     [
        //     'name' => 'Direktur Teknik',
        //     'email' => 'dirtek@evkin.smd',
        //     'password' => bcrypt('samarinda@2024')
        // ]
        // );
        // $dirtek->assignRole('dirtek');

        // $dirpel = User::create(
        //     [
        //     'name' => 'Direktur Pelayanan',
        //     'email' => 'dirpel@evkin.smd',
        //     'password' => bcrypt('samarinda@2024')
        // ]
        // );
        // $dirpel->assignRole('dirpel');

        // $adminUmum = User::create(
        //     [
        //     'name' => 'Admin Umum',
        //     'email' => 'adminUmum@evkin.smd',
        //     'password' => bcrypt('samarinda@2024')
        // ]
        // );
        // $adminUmum->assignRole('adminUmum');

        // $adminTeknik = User::create(
        //     [
        //     'name' => 'Admin Teknik',
        //     'email' => 'adminTeknik@evkin.smd',
        //     'password' => bcrypt('samarinda@2024')
        // ]
        // );
        // $adminTeknik->assignRole('adminTeknik');

        // $adminLayan = User::create(
        //     [
        //     'name' => 'Admin Pelayanan',
        //     'email' => 'adminPelayanan@evkin.smd',
        //     'password' => bcrypt('samarinda@2024')
        // ]
        // );
        // $adminLayan->assignRole('adminLayan');

        $spi = User::create(
            [
            'name' => 'SPI',
            'email' => 'spi@evkin.smd',
            'password' => bcrypt('samarinda@2024')
        ]
        );
        $spi->assignRole('spi');
    }
}
