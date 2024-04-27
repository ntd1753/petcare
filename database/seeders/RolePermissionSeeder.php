<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Tạo Permissions
        Permission::create(['name' => 'edit profile']);
        Permission::create(['name' => 'view records']);
        Permission::create(['name' => 'edit records']);

        // Tạo Roles và gán Permissions
        $roleDoctor = Role::create(['name' => 'doctor']);
        $roleDoctor->givePermissionTo(['edit profile', 'view records', 'edit records']);

        $roleCustomer = Role::create(['name' => 'customer']);
        $roleCustomer->givePermissionTo(['edit profile']);

        $roleManager = Role::create(['name' => 'manager']);
        $roleManager->givePermissionTo(['edit profile', 'view records']);

        $roleAdmin = Role::create(['name' => 'admin']);
        $roleAdmin->givePermissionTo(Permission::all());
    }
}
