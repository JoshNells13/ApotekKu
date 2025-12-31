<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        // Clear cache permission (WAJIB)
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $ownerRole = Role::create([
            'name' => 'owner'
        ]);

        $buyerRole = Role::create([
            'name' => 'buyer'
        ]);

        $user = User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('12345678')
        ]);

        $user->assignRole($ownerRole);

    }
}
