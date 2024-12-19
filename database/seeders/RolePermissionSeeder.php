<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Role::create(['name'=>'de-was']);
        // Permission::create(['name' =>'dewas']);
        // $roleLl= Role::findByName('de-was');
        // $roleLl->givePermissionTo('dewas');

        // Role::create(['name'=>'dirut']);
        // Permission::create(['name' =>'utama']);
        // $roleLl= Role::findByName('dirut');
        // $roleLl->givePermissionTo('utama');

        Role::create(['name'=>'dirtek']);
        Permission::create(['name' =>'teknik']);
        $roleLl= Role::findByName('dirtek');
        $roleLl->givePermissionTo('teknik');

        // Role::create(['name'=>'dirpel']);
        // Permission::create(['name' =>'pelayanan']);
        // $roleLl= Role::findByName('dirpel');
        // $roleLl->givePermissionTo('pelayanan');

        // Role::create(['name'=>'adminUtama']);
        // Permission::create(['name' =>'lihat-utama']);
        // $roleLl= Role::findByName('adminUtama');
        // $roleLl->givePermissionTo('lihat-utama');

        // Role::create(['name'=>'adminUmum']);
        // Permission::create(['name' =>'lihat-umum']);
        // $roleLl= Role::findByName('adminUmum');
        // $roleLl->givePermissionTo('lihat-umum');

        // Role::create(['name'=>'adminTeknik']);
        // Permission::create(['name' =>'lihat-teknik']);
        // $roleLl= Role::findByName('adminTeknik');
        // $roleLl->givePermissionTo('lihat-teknik');

        // Role::create(['name'=>'adminLayan']);
        // Permission::create(['name' =>'lihat-layan']);
        // $roleLl= Role::findByName('adminLayan');
        // $roleLl->givePermissionTo('lihat-layan');

        // Role::create(['name'=>'spi']);
        // Permission::create(['name' =>'verifikasi']);
        // $roleLl= Role::findByName('spi');
        // $roleLl->givePermissionTo('verifikasi');
    }
}
