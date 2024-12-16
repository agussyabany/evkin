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
        //Role::create(['name'=>'sekretaris']);
        //Permission::create(['name' =>'buat-dashboard']);
        $roleLl= Role::findByName('sekretaris');
        $roleLl->givePermissionTo('buat-dashboard');
    }
}
