<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        // Create Permissions if not already created
        Permission::firstOrCreate(['name' => 'manage books']);
        Permission::firstOrCreate(['name' => 'manage students']);
        Permission::firstOrCreate(['name' => 'view reports']);
        Permission::firstOrCreate(['name' => 'manage invoices']);
        Permission::firstOrCreate(['name' => 'borrow books']);
        
        // Create Roles
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $studentRole = Role::firstOrCreate(['name' => 'student']);
        
        // Assign Permissions to Roles
        $adminRole->givePermissionTo(['manage books', 'manage students', 'view reports', 'manage invoices']);
        $studentRole->givePermissionTo('borrow books'); // Students only get permission to borrow books
    }
}
