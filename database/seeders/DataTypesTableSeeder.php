<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DataTypesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('data_types')->delete();
        
        \DB::table('data_types')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'users',
                'slug' => 'users',
                'display_name_singular' => 'User',
                'display_name_plural' => 'Users',
                'icon' => 'voyager-person',
                'model_name' => 'TCG\\Voyager\\Models\\User',
                'policy_name' => 'TCG\\Voyager\\Policies\\UserPolicy',
                'controller' => 'TCG\\Voyager\\Http\\Controllers\\VoyagerUserController',
                'description' => '',
                'generate_permissions' => 1,
                'server_side' => 0,
                'details' => NULL,
                'created_at' => '2021-06-02 17:55:30',
                'updated_at' => '2021-06-02 17:55:30',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'menus',
                'slug' => 'menus',
                'display_name_singular' => 'Menu',
                'display_name_plural' => 'Menus',
                'icon' => 'voyager-list',
                'model_name' => 'TCG\\Voyager\\Models\\Menu',
                'policy_name' => NULL,
                'controller' => '',
                'description' => '',
                'generate_permissions' => 1,
                'server_side' => 0,
                'details' => NULL,
                'created_at' => '2021-06-02 17:55:30',
                'updated_at' => '2021-06-02 17:55:30',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'roles',
                'slug' => 'roles',
                'display_name_singular' => 'Role',
                'display_name_plural' => 'Roles',
                'icon' => 'voyager-lock',
                'model_name' => 'TCG\\Voyager\\Models\\Role',
                'policy_name' => NULL,
                'controller' => 'TCG\\Voyager\\Http\\Controllers\\VoyagerRoleController',
                'description' => '',
                'generate_permissions' => 1,
                'server_side' => 0,
                'details' => NULL,
                'created_at' => '2021-06-02 17:55:31',
                'updated_at' => '2021-06-02 17:55:31',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'countries',
                'slug' => 'countries',
                'display_name_singular' => 'País',
                'display_name_plural' => 'Países',
                'icon' => 'voyager-world',
                'model_name' => 'App\\Models\\Country',
                'policy_name' => NULL,
                'controller' => NULL,
                'description' => NULL,
                'generate_permissions' => 1,
                'server_side' => 0,
                'details' => '{"order_column":null,"order_display_column":null,"order_direction":"asc","default_search_key":null,"scope":null}',
                'created_at' => '2021-08-17 23:39:54',
                'updated_at' => '2021-08-18 00:36:56',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'states',
                'slug' => 'states',
                'display_name_singular' => 'Departamento',
                'display_name_plural' => 'Departamentos',
                'icon' => 'voyager-milestone',
                'model_name' => 'App\\Models\\State',
                'policy_name' => NULL,
                'controller' => NULL,
                'description' => NULL,
                'generate_permissions' => 1,
                'server_side' => 0,
                'details' => '{"order_column":null,"order_display_column":null,"order_direction":"asc","default_search_key":null,"scope":null}',
                'created_at' => '2021-08-17 23:43:17',
                'updated_at' => '2021-08-17 23:45:01',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'cities',
                'slug' => 'cities',
                'display_name_singular' => 'Ciudad',
                'display_name_plural' => 'Ciudades',
                'icon' => 'voyager-location',
                'model_name' => 'App\\Models\\City',
                'policy_name' => NULL,
                'controller' => NULL,
                'description' => NULL,
                'generate_permissions' => 1,
                'server_side' => 0,
                'details' => '{"order_column":null,"order_display_column":null,"order_direction":"asc","default_search_key":null,"scope":null}',
                'created_at' => '2021-08-17 23:46:48',
                'updated_at' => '2021-08-18 00:38:34',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'hotels_groups',
                'slug' => 'hotels-groups',
                'display_name_singular' => 'Cadena de Hotel',
                'display_name_plural' => 'Cadenas de Hoteles',
                'icon' => 'voyager-tag',
                'model_name' => 'App\\Models\\HotelsGroup',
                'policy_name' => NULL,
                'controller' => NULL,
                'description' => NULL,
                'generate_permissions' => 1,
                'server_side' => 0,
                'details' => '{"order_column":null,"order_display_column":null,"order_direction":"asc","default_search_key":null,"scope":null}',
                'created_at' => '2021-08-17 23:54:46',
                'updated_at' => '2021-08-18 00:39:09',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'hotels_categories',
                'slug' => 'hotels-categories',
                'display_name_singular' => 'Categoría de hotel',
                'display_name_plural' => 'Categorías de hoteles',
                'icon' => 'voyager-certificate',
                'model_name' => 'App\\Models\\HotelsCategory',
                'policy_name' => NULL,
                'controller' => NULL,
                'description' => NULL,
                'generate_permissions' => 1,
                'server_side' => 0,
                'details' => '{"order_column":null,"order_display_column":null,"order_direction":"asc","default_search_key":null,"scope":null}',
                'created_at' => '2021-08-18 00:02:58',
                'updated_at' => '2021-08-18 00:39:53',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'hotels_types',
                'slug' => 'hotels-types',
                'display_name_singular' => 'Tipo de hotel',
                'display_name_plural' => 'Tipos de hoteles',
                'icon' => 'voyager-credit-card',
                'model_name' => 'App\\Models\\HotelsType',
                'policy_name' => NULL,
                'controller' => NULL,
                'description' => NULL,
                'generate_permissions' => 1,
                'server_side' => 0,
                'details' => '{"order_column":null,"order_display_column":null,"order_direction":"asc","default_search_key":null,"scope":null}',
                'created_at' => '2021-08-18 00:12:56',
                'updated_at' => '2021-08-18 00:40:42',
            ),
            9 => 
            array (
                'id' => 11,
                'name' => 'hotels_rooms_types',
                'slug' => 'hotels-rooms-types',
                'display_name_singular' => 'Tipo de habitación',
                'display_name_plural' => 'Tipos de habitaciones',
                'icon' => 'voyager-bookmark',
                'model_name' => 'App\\Models\\HotelsRoomsType',
                'policy_name' => NULL,
                'controller' => NULL,
                'description' => NULL,
                'generate_permissions' => 1,
                'server_side' => 0,
                'details' => '{"order_column":null,"order_display_column":null,"order_direction":"asc","default_search_key":null,"scope":null}',
                'created_at' => '2021-08-18 00:18:15',
                'updated_at' => '2021-08-18 00:41:20',
            ),
            10 => 
            array (
                'id' => 12,
                'name' => 'provinces',
                'slug' => 'provinces',
                'display_name_singular' => 'Provincia',
                'display_name_plural' => 'Provincias',
                'icon' => 'voyager-pie-graph',
                'model_name' => 'App\\Models\\Province',
                'policy_name' => NULL,
                'controller' => NULL,
                'description' => NULL,
                'generate_permissions' => 1,
                'server_side' => 0,
                'details' => '{"order_column":null,"order_display_column":null,"order_direction":"asc","default_search_key":null,"scope":null}',
                'created_at' => '2021-08-18 00:28:37',
                'updated_at' => '2021-08-18 00:56:30',
            ),
        ));
        
        
    }
}