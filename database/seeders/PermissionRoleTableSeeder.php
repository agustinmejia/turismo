<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\Permission;
use TCG\Voyager\Models\Role;

class PermissionRoleTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::where('name', 'admin')->firstOrFail();
        $permissions = Permission::all();
        $role->permissions()->sync(
            $permissions->pluck('id')->all()
        );

        // Roles de propietario
        $role = Role::where('name', 'owner')->firstOrFail();
        $permissions = Permission::whereRaw('id = 1')->get();
        $role->permissions()->sync(
            $permissions->pluck('id')->all()
        );
    }
}
