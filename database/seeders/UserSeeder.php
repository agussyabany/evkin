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
        $dewas = User::create(
            [
               'name' => 'FARADIBA',
               'email' => 'fara@evkin.smd',
               'password' => bcrypt('a')
           ]
       );
       $dewas->assignRole('sekretaris');
    }
}
