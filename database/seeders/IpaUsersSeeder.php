<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class IpaUsersSeeder extends Seeder
{
    public function run(): void
    {
        // Password awal untuk akun demo. Ubah setelah proses seeding.
        $password = Hash::make('tirtakencana2026');

        $users = [
            ['name' => "AMIEN MA'RUF", 'email' => 'amien@bantuas.id', 'nipp' => '1983.2007.1.417', 'jabatan' => 2, 'ipa' => 8],
            ['name' => "AMIEN MA'RUF", 'email' => 'amien@kalhol.id', 'nipp' => '1983.2007.1.417', 'jabatan' => 2, 'ipa' => 15],
            ['name' => "AMIEN MA'RUF", 'email' => 'amien@palaran.id', 'nipp' => '1983.2007.1.417', 'jabatan' => 2, 'ipa' => 11],
            ['name' => "AMIEN MA'RUF", 'email' => 'amien@bukuan.id', 'nipp' => '1983.2007.1.417', 'jabatan' => 2, 'ipa' => 13],
            //['name' => 'ANWAR HANANI', 'email' => 'anwar@gudang.smd', 'nipp' => '1974.2000.1.335', 'jabatan' => 1, 'ipa' => 19],
            //['name' => 'AYUB ABDULLAH', 'email' => 'ayub@tirtakencana.id', 'nipp' => '1982.2008.1.447', 'jabatan' => 1, 'ipa' => 16],
            ['name' => 'BUDI SISWANTO', 'email' => 'budi@laobakung.id', 'nipp' => '1976.2011.1.467', 'jabatan' => 2, 'ipa' => 4],
            ['name' => 'BUDI SISWANTO', 'email' => 'budi@loakumbar.id', 'nipp' => '1976.2011.1.467', 'jabatan' => 2, 'ipa' => 23],
            ['name' => 'BUDI SISWANTO', 'email' => 'budi@beng dang2.id', 'nipp' => '1976.2011.1.467', 'jabatan' => 2, 'ipa' => 22],
            //['name' => 'DONNY FERGIANTO, S.E.', 'email' => 'dony@gudang.id', 'nipp' => '1976.2006.1.405', 'jabatan' => 2, 'ipa' => 19],
            //['name' => 'ELZA RIZQI ANANDA', 'email' => 'nanda@tirtakencana.id', 'nipp' => '1995.2020.1.733', 'jabatan' => 1, 'ipa' => 17],
            //['name' => 'Faradiba', 'email' => 'faradiba90@sekretaris.id', 'nipp' => '1990.2019.2.587', 'jabatan' => 1, 'ipa' => 16],
            //['name' => 'HAMDANI', 'email' => 'dani@ipacendana.id', 'nipp' => '1975.1997.1.290', 'jabatan' => 2, 'ipa' => 12],
            ['name' => 'ISTADI', 'email' => 'istadi@seberang.id', 'nipp' => '1973.1998.1.309', 'jabatan' => 2, 'ipa' => 9],
            ['name' => 'ISTADI', 'email' => 'istadi@lipan.id', 'nipp' => '1973.1998.1.309', 'jabatan' => 2, 'ipa' => 5],
            ['name' => "MUHAMMAD RAFI'I", 'email' => 'rafi@sempaja.id', 'nipp' => '1987.2007.1.427', 'jabatan' => 2, 'ipa' => 18],
            ['name' => "MUHAMMAD RAFI'I", 'email' => 'rafi@berambai.id', 'nipp' => '1987.2007.1.427', 'jabatan' => 2, 'ipa' => 21],
            ['name' => "MUHAMMAD RAFI'I", 'email' => 'rafi@bengkur ing.id', 'nipp' => '1987.2007.1.427', 'jabatan' => 2, 'ipa' => 1],
            ['name' => 'MUHAMMAD TAJRI', 'email' => 'tajri@gunung.id', 'nipp' => '1977.2001.1.356', 'jabatan' => 2, 'ipa' => 5],
            ['name' => 'MUHAMMAD TAJRI', 'email' => 'tajri@pampang.id', 'nipp' => '1977.2001.1.356', 'jabatan' => 2, 'ipa' => 14],
            //['name' => 'ROBY IRWAN', 'email' => 'robi@tirtakencana.id', 'nipp' => '1984.2012.1.497', 'jabatan' => 1, 'ipa' => 17],
            //['name' => 'SURYADI, S.E.', 'email' => 'suryadi@tirtakencana.id', 'nipp' => '1973.1994.1.236', 'jabatan' => 2, 'ipa' => 16],
            //['name' => 'TOMMY FERNANDA, S.E.', 'email' => 'tomi@tirtakencana.id', 'nipp' => '1975.1997.1.289', 'jabatan' => 2, 'ipa' => 17],
            ['name' => 'TRI ADI WIBISONO', 'email' => 'dede@tirtakencana.smd', 'nipp' => '1984.2008.1.455', 'jabatan' => 1, 'ipa' => 12],
            ['name' => 'TRI SUDARWANTO', 'email' => 'tri@puluatas.id', 'nipp' => '1985.2007.1.420', 'jabatan' => 2, 'ipa' => 2],
            ['name' => 'TRI SUDARWANTO', 'email' => 'tri@makroman.id', 'nipp' => '1985.2007.1.420', 'jabatan' => 2, 'ipa' => 7],
        ];

        foreach ($users as $data) {
            $user = User::updateOrCreate(
                ['email' => $data['email']],
                [
                    'name' => $data['name'],
                    'nipp' => $data['nipp'],
                    'jabatan' => $data['jabatan'],
                    'ipa' => $data['ipa'],
                    'password' => $password,
                ]
            );

            $user->syncRoles(['ipa']);
        }
    }
}
