<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            // [
            //     'name' => 'dewas',
            //     'email' => 'dewas@evkin.smd',
            //     'password' => bcrypt('samarinda@2024'),
            //     'role' => 'de-was',
            // ],
            // [
            //     'name' => 'Admin Utama',
            //     'email' => 'adminUtama@evkin.smd',
            //     'password' => bcrypt('samarinda@2024'),
            //     'role' => 'adminUtama',
            // ],
            // [
            //     'name' => 'Direktur Utama',
            //     'email' => 'dirut@evkin.smd',
            //     'password' => bcrypt('samarinda@2024'),
            //     'role' => 'dirut',
            // ],
            // [
            //     'name' => 'Direktur Umum',
            //     'email' => 'dirum@evkin.smd',
            //     'password' => bcrypt('samarinda@2024'),
            //     'role' => 'dirut',
            // ],
            // [
            //     'name' => 'Direktur Teknik',
            //     'email' => 'dirtek@evkin.smd',
            //     'password' => bcrypt('samarinda@2024'),
            //     'role' => 'dirtek',
            // ],
            // [
            //     'name' => 'Direktur Pelayanan',
            //     'email' => 'dirpel@evkin.smd',
            //     'password' => bcrypt('samarinda@2024'),
            //     'role' => 'dirpel',
            // ],
            // [
            //     'name' => 'Admin Umum',
            //     'email' => 'adminUmum@evkin.smd',
            //     'password' => bcrypt('samarinda@2024'),
            //     'role' => 'adminUmum',
            // ],
            // [
            //     'name' => 'Admin Teknik',
            //     'email' => 'adminTeknik@evkin.smd',
            //     'password' => bcrypt('samarinda@2024'),
            //     'role' => 'adminTeknik',
            // ],
            // [
            //     'name' => 'Admin Pelayanan',
            //     'email' => 'adminPelayanan@evkin.smd',
            //     'password' => bcrypt('samarinda@2024'),
            //     'role' => 'adminLayan',
            // ],
            // [
            //     'name' => 'Muhammad Agus Syabany',
            //     'email' => 'agus@evkin.smd',
            //     'password' => bcrypt('a'),
            //     'role' => 'agus',
            // ]
            // [
            //     'name' => 'UMUM',
            //     'email' => 'umum@evkin.smd',
            //     'password' => bcrypt('tirtakencana24'),
            //     'role' => 'de-was',
            // ]
            // [
            //     'name' => 'PENELITIAN',
            //     'email' => 'penelitian@evkin.smd',
            //     'password' => bcrypt('tirtakencana25'),
            //     'role' => 'de-was',
            // ]
            [
                'name' => 'FARADIBA',
                'email' => 'faradiba@evkin.smd',
                'password' => bcrypt('tirtakencana25'),
                'role' => 'dirut',
            ],
            [
                'name' => 'ALFI',
                'email' => 'alfi@evkin.smd',
                'password' => bcrypt('tirtakencana25'),
                'role' => 'dirut',
            ]
        ];

        foreach ($users as $userData) {
            // Create or update user
            $user = User::updateOrCreate(
                ['email' => $userData['email']], // Check by email
                [
                    'name' => $userData['name'],
                    'password' => $userData['password'],
                ]
            );

            // Assign role to user if not already assigned
            if (!$user->hasRole($userData['role'])) {
                $user->assignRole($userData['role']);
            }
        }
    }
}
