<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        // Clear cache permission (WAJIB)
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // Buat role
        Role::firstOrCreate(['name' => 'admin']);
        Role::firstOrCreate(['name' => 'pembeli']);
    }
}
