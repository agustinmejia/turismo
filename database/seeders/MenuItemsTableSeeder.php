<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MenuItemsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('menu_items')->delete();
        
        \DB::table('menu_items')->insert(array (
            0 => 
            array (
                'id' => 1,
                'menu_id' => 1,
                'title' => 'Inicio',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-home',
                'color' => '#000000',
                'parent_id' => NULL,
                'order' => 1,
                'created_at' => '2021-06-02 17:55:32',
                'updated_at' => '2021-08-18 09:47:12',
                'route' => 'voyager.dashboard',
                'parameters' => 'null',
            ),
            1 => 
            array (
                'id' => 2,
                'menu_id' => 1,
                'title' => 'Media',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-images',
                'color' => NULL,
                'parent_id' => 5,
                'order' => 3,
                'created_at' => '2021-06-02 17:55:32',
                'updated_at' => '2021-08-17 20:30:25',
                'route' => 'voyager.media.index',
                'parameters' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'menu_id' => 1,
                'title' => 'Usuarios',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-person',
                'color' => '#000000',
                'parent_id' => 11,
                'order' => 1,
                'created_at' => '2021-06-02 17:55:32',
                'updated_at' => '2021-08-17 20:30:49',
                'route' => 'voyager.users.index',
                'parameters' => 'null',
            ),
            3 => 
            array (
                'id' => 4,
                'menu_id' => 1,
                'title' => 'Roles',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-lock',
                'color' => NULL,
                'parent_id' => 11,
                'order' => 2,
                'created_at' => '2021-06-02 17:55:32',
                'updated_at' => '2021-06-02 14:08:05',
                'route' => 'voyager.roles.index',
                'parameters' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'menu_id' => 1,
                'title' => 'Herramientas',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-tools',
                'color' => '#000000',
                'parent_id' => NULL,
                'order' => 8,
                'created_at' => '2021-06-02 17:55:32',
                'updated_at' => '2021-09-08 03:30:08',
                'route' => NULL,
                'parameters' => '',
            ),
            5 => 
            array (
                'id' => 6,
                'menu_id' => 1,
                'title' => 'Menu Builder',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-list',
                'color' => NULL,
                'parent_id' => 5,
                'order' => 1,
                'created_at' => '2021-06-02 17:55:33',
                'updated_at' => '2021-08-17 20:30:25',
                'route' => 'voyager.menus.index',
                'parameters' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'menu_id' => 1,
                'title' => 'Database',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-data',
                'color' => NULL,
                'parent_id' => 5,
                'order' => 2,
                'created_at' => '2021-06-02 17:55:33',
                'updated_at' => '2021-08-17 20:30:25',
                'route' => 'voyager.database.index',
                'parameters' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'menu_id' => 1,
                'title' => 'Compass',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-compass',
                'color' => NULL,
                'parent_id' => 5,
                'order' => 4,
                'created_at' => '2021-06-02 17:55:33',
                'updated_at' => '2021-08-17 20:30:25',
                'route' => 'voyager.compass.index',
                'parameters' => NULL,
            ),
            8 => 
            array (
                'id' => 9,
                'menu_id' => 1,
                'title' => 'BREAD',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-bread',
                'color' => NULL,
                'parent_id' => 5,
                'order' => 5,
                'created_at' => '2021-06-02 17:55:33',
                'updated_at' => '2021-08-17 20:30:25',
                'route' => 'voyager.bread.index',
                'parameters' => NULL,
            ),
            9 => 
            array (
                'id' => 10,
                'menu_id' => 1,
                'title' => 'Configuración',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-settings',
                'color' => '#000000',
                'parent_id' => NULL,
                'order' => 7,
                'created_at' => '2021-06-02 17:55:33',
                'updated_at' => '2021-09-04 20:04:15',
                'route' => 'voyager.settings.index',
                'parameters' => 'null',
            ),
            10 => 
            array (
                'id' => 11,
                'menu_id' => 1,
                'title' => 'Seguridad',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-lock',
                'color' => '#000000',
                'parent_id' => NULL,
                'order' => 6,
                'created_at' => '2021-06-02 14:07:53',
                'updated_at' => '2021-09-04 11:32:01',
                'route' => NULL,
                'parameters' => '',
            ),
            11 => 
            array (
                'id' => 12,
                'menu_id' => 1,
                'title' => 'Limpiar cache',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-refresh',
                'color' => '#000000',
                'parent_id' => 5,
                'order' => 6,
                'created_at' => '2021-06-25 18:03:59',
                'updated_at' => '2021-08-17 20:30:25',
                'route' => 'clear.cache',
                'parameters' => NULL,
            ),
            12 => 
            array (
                'id' => 13,
                'menu_id' => 1,
                'title' => 'Países',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-world',
                'color' => '#000000',
                'parent_id' => 18,
                'order' => 1,
                'created_at' => '2021-08-17 23:39:54',
                'updated_at' => '2021-08-29 23:41:46',
                'route' => 'voyager.countries.index',
                'parameters' => 'null',
            ),
            13 => 
            array (
                'id' => 14,
                'menu_id' => 1,
                'title' => 'Departamentos',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-milestone',
                'color' => NULL,
                'parent_id' => 18,
                'order' => 2,
                'created_at' => '2021-08-17 23:43:17',
                'updated_at' => '2021-08-29 23:41:46',
                'route' => 'voyager.states.index',
                'parameters' => NULL,
            ),
            14 => 
            array (
                'id' => 15,
                'menu_id' => 1,
                'title' => 'Ciudades',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-location',
                'color' => NULL,
                'parent_id' => 18,
                'order' => 4,
                'created_at' => '2021-08-17 23:46:48',
                'updated_at' => '2021-08-29 23:41:46',
                'route' => 'voyager.cities.index',
                'parameters' => NULL,
            ),
            15 => 
            array (
                'id' => 16,
                'menu_id' => 1,
                'title' => 'Cadenas de Hoteles',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-tag',
                'color' => '#000000',
                'parent_id' => 24,
                'order' => 4,
                'created_at' => '2021-08-17 23:54:47',
                'updated_at' => '2021-08-29 23:41:45',
                'route' => 'voyager.hotels-groups.index',
                'parameters' => 'null',
            ),
            16 => 
            array (
                'id' => 17,
                'menu_id' => 1,
                'title' => 'Subcategorías',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-certificate',
                'color' => '#000000',
                'parent_id' => 24,
                'order' => 3,
                'created_at' => '2021-08-18 00:02:58',
                'updated_at' => '2021-08-29 23:41:45',
                'route' => 'voyager.hotels-categories.index',
                'parameters' => 'null',
            ),
            17 => 
            array (
                'id' => 18,
                'menu_id' => 1,
                'title' => 'Parámetros',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-params',
                'color' => '#000000',
                'parent_id' => NULL,
                'order' => 4,
                'created_at' => '2021-08-18 00:04:47',
                'updated_at' => '2021-08-29 23:33:43',
                'route' => NULL,
                'parameters' => '',
            ),
            18 => 
            array (
                'id' => 19,
                'menu_id' => 1,
                'title' => 'Categorías',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-credit-card',
                'color' => '#000000',
                'parent_id' => 24,
                'order' => 2,
                'created_at' => '2021-08-18 00:12:57',
                'updated_at' => '2021-08-29 23:41:45',
                'route' => 'voyager.hotels-types.index',
                'parameters' => 'null',
            ),
            19 => 
            array (
                'id' => 20,
                'menu_id' => 1,
                'title' => 'Tipos de habitaciones',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-bookmark',
                'color' => NULL,
                'parent_id' => 24,
                'order' => 6,
                'created_at' => '2021-08-18 00:18:15',
                'updated_at' => '2021-08-29 23:41:45',
                'route' => 'voyager.hotels-rooms-types.index',
                'parameters' => NULL,
            ),
            20 => 
            array (
                'id' => 21,
                'menu_id' => 1,
                'title' => 'Provincias',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-pie-graph',
                'color' => NULL,
                'parent_id' => 18,
                'order' => 3,
                'created_at' => '2021-08-18 00:28:38',
                'updated_at' => '2021-08-29 23:41:46',
                'route' => 'voyager.provinces.index',
                'parameters' => NULL,
            ),
            21 => 
            array (
                'id' => 22,
                'menu_id' => 1,
                'title' => 'Prestadores de servicios',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-company',
                'color' => '#000000',
                'parent_id' => NULL,
                'order' => 2,
                'created_at' => '2021-08-19 10:41:04',
                'updated_at' => '2021-08-21 14:17:55',
                'route' => 'voyager.hotels.index',
                'parameters' => 'null',
            ),
            22 => 
            array (
                'id' => 23,
                'menu_id' => 1,
                'title' => 'Tipos de documentos',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-tag',
                'color' => '#000000',
                'parent_id' => 24,
                'order' => 5,
                'created_at' => '2021-08-23 08:32:36',
                'updated_at' => '2021-08-29 23:41:45',
                'route' => 'voyager.hotels-documents-types.index',
                'parameters' => 'null',
            ),
            23 => 
            array (
                'id' => 24,
                'menu_id' => 1,
                'title' => 'Administración',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-window-list',
                'color' => '#000000',
                'parent_id' => NULL,
                'order' => 3,
                'created_at' => '2021-08-29 23:33:28',
                'updated_at' => '2021-08-29 23:34:30',
                'route' => NULL,
                'parameters' => '',
            ),
            24 => 
            array (
                'id' => 25,
                'menu_id' => 1,
                'title' => 'Permisos',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-list',
                'color' => NULL,
                'parent_id' => 11,
                'order' => 3,
                'created_at' => '2021-08-29 23:37:36',
                'updated_at' => '2021-08-29 23:37:57',
                'route' => 'voyager.permissions.index',
                'parameters' => NULL,
            ),
            25 => 
            array (
                'id' => 26,
                'menu_id' => 1,
                'title' => 'Tipos',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-credit-cards',
                'color' => NULL,
                'parent_id' => 24,
                'order' => 1,
                'created_at' => '2021-08-29 23:41:25',
                'updated_at' => '2021-08-29 23:41:45',
                'route' => 'voyager.hotels-types-groups.index',
                'parameters' => NULL,
            ),
            26 => 
            array (
                'id' => 27,
                'menu_id' => 1,
                'title' => 'Reportes',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-bar-chart',
                'color' => '#000000',
                'parent_id' => NULL,
                'order' => 5,
                'created_at' => '2021-09-04 10:09:31',
                'updated_at' => '2021-09-04 11:32:01',
                'route' => NULL,
                'parameters' => '',
            ),
            27 => 
            array (
                'id' => 28,
                'menu_id' => 1,
                'title' => 'Registro de actividades',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-logbook',
                'color' => '#000000',
                'parent_id' => 27,
                'order' => 1,
                'created_at' => '2021-09-04 11:31:45',
                'updated_at' => '2021-09-04 11:31:54',
                'route' => 'reports.register_activities',
                'parameters' => NULL,
            ),
            28 => 
            array (
                'id' => 29,
                'menu_id' => 1,
                'title' => 'Estadísticas nacionales',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-pie-chart',
                'color' => '#000000',
                'parent_id' => 27,
                'order' => 2,
                'created_at' => '2021-09-04 20:04:05',
                'updated_at' => '2021-09-04 20:04:14',
                'route' => 'reports.national_activities',
                'parameters' => NULL,
            ),
            29 => 
            array (
                'id' => 30,
                'menu_id' => 1,
                'title' => 'Estadísticas internacionales',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-world',
                'color' => '#000000',
                'parent_id' => 27,
                'order' => 3,
                'created_at' => '2021-09-08 03:29:59',
                'updated_at' => '2021-09-08 03:30:08',
                'route' => 'reports.international_activities',
                'parameters' => NULL,
            ),
        ));
        
        
    }
}