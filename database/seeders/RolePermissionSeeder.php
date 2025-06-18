<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Commands\CreateRole;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name'=>'student.view']);
        Permission::create(['name'=>'student.create']);
        Permission::create(['name'=>'student.edit']);
        Permission::create(['name'=>'student.delete']);

        $admin = Role::create(['name'=>'Admin']);
        $admin->givePermissionTo(Permission::all());


        $teacher = Role::create(['name'=>'Teacher']);
        $teacher->givePermissionTo('student.view');


        $staff = Role::create(['name'=>'Staff']);
        $staff->givePermissionTo('student.view','student.create','student.edit');
    }
}
