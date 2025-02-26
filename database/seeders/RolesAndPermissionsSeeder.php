<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        // Create Permissions
        Permission::create(['name' => 'manage books']);
        Permission::create(['name' => 'manage students']);
        Permission::create(['name' => 'view reports']);
        Permission::create(['name' => 'manage invoices']);
        Permission::create(['name' => 'borrow books']);
        
        // Create Roles
        $adminRole = Role::create(['name' => 'admin']);
        $studentRole = Role::create(['name' => 'student']);
        
        // Assign Permissions to Roles
        $adminRole->givePermissionTo(['manage books', 'manage students', 'view reports', 'manage invoices']);
        $studentRole->givePermissionTo('borrow books'); // Students only get permission to borrow books
    }
}
