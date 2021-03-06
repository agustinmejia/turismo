<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     */
    public function run()
    {
        $keys = [
            'browse_admin',
            'browse_bread',
            'browse_database',
            'browse_media',
            'browse_compass',
            'browse_clear-cache',
        ];

        foreach ($keys as $key) {
            Permission::firstOrCreate([
                'key'        => $key,
                'table_name' => null,
            ]);
        }

        Permission::generateFor('menus');
        Permission::generateFor('roles');
        Permission::generateFor('users');
        Permission::generateFor('settings');

        Permission::generateFor('countries');
        Permission::generateFor('states');
        Permission::generateFor('provinces');
        Permission::generateFor('cities');
        Permission::generateFor('hotels');
        Permission::generateFor('hotels_groups');
        Permission::generateFor('hotels_categories');
        Permission::generateFor('hotels_types');
        Permission::generateFor('hotels_types_groups');
        Permission::generateFor('hotels_rooms_types');
        Permission::generateFor('hotels_documents_types');
        Permission::generateFor('hotels_documents');

        $keys = [
            'browse_reportesregister_activities'
        ];

        foreach ($keys as $key) {
            Permission::firstOrCreate([
                'key'        => $key,
                'table_name' => 'reportes',
            ]);
        }
    }
}
