<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class PermissionsSeeder extends Seeder

{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $adminRole = Role::create([
            'name' => 'Admin',
            'guard_name' => 'web',
        ]);

        $userRole = Role::create([
            'name' => 'User',
            'guard_name' => 'web'
        ]);

        // Permission Variables
        $viewAdminDashboard = Permission::create(['name' => 'view-admin-dashboard', 'guard_name' => 'web']);

        // Sync Permissions
        $adminRole->syncPermissions([
            $viewAdminDashboard
        ]);

        // Create Super Admin Role
        $user = User::find('1')->assignRole('Admin');
    }
}
