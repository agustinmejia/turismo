<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class StatesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('states')->delete();
        
        \DB::table('states')->insert(array (
            0 => 
            array (
                'id' => 1,
                'country_id' => 1,
                'name' => 'Beni',
                'slug' => 'beni',
                'created_at' => '2021-08-18 00:51:10',
                'updated_at' => '2021-08-18 00:51:10',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'country_id' => 1,
                'name' => 'Pando',
                'slug' => 'pando',
                'created_at' => '2021-08-18 00:51:34',
                'updated_at' => '2021-08-18 00:51:34',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'country_id' => 1,
                'name' => 'Santa Cruz',
                'slug' => 'santa-cruz',
                'created_at' => '2021-08-18 00:51:54',
                'updated_at' => '2021-08-18 00:51:54',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'country_id' => 1,
                'name' => 'La Paz',
                'slug' => 'la-paz',
                'created_at' => '2021-08-18 00:52:13',
                'updated_at' => '2021-08-18 00:52:13',
                'deleted_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'country_id' => 1,
                'name' => 'Cochabamba',
                'slug' => 'cochabamba',
                'created_at' => '2021-08-18 00:52:40',
                'updated_at' => '2021-08-18 00:52:40',
                'deleted_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'country_id' => 1,
                'name' => 'Chuquisaca',
                'slug' => 'chuquisaca',
                'created_at' => '2021-08-18 00:53:05',
                'updated_at' => '2021-08-18 00:53:05',
                'deleted_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'country_id' => 1,
                'name' => 'Oruro',
                'slug' => 'oruro',
                'created_at' => '2021-08-18 00:53:22',
                'updated_at' => '2021-08-18 00:53:22',
                'deleted_at' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'country_id' => 1,
                'name' => 'Potosí',
                'slug' => 'potosi',
                'created_at' => '2021-08-18 00:53:42',
                'updated_at' => '2021-08-18 00:53:42',
                'deleted_at' => NULL,
            ),
            8 => 
            array (
                'id' => 9,
                'country_id' => 1,
                'name' => 'Tarija',
                'slug' => 'tarija',
                'created_at' => '2021-08-18 00:54:00',
                'updated_at' => '2021-08-18 00:54:00',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}