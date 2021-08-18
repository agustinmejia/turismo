<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CountriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('countries')->delete();
        
        \DB::table('countries')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Bolivia',
                'slug' => 'bolivia',
                'created_at' => '2021-08-18 00:45:06',
                'updated_at' => '2021-08-18 00:45:06',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Argentina',
                'slug' => 'argentina',
                'created_at' => '2021-08-18 00:46:06',
                'updated_at' => '2021-08-18 00:46:06',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Brasil',
                'slug' => 'brasil',
                'created_at' => '2021-08-18 00:46:35',
                'updated_at' => '2021-08-18 00:46:35',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Colombia',
                'slug' => 'colombia',
                'created_at' => '2021-08-18 00:46:56',
                'updated_at' => '2021-08-18 00:46:56',
                'deleted_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Chile',
                'slug' => 'chile',
                'created_at' => '2021-08-18 00:47:20',
                'updated_at' => '2021-08-18 00:47:20',
                'deleted_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Ecuador',
                'slug' => 'ecuador',
                'created_at' => '2021-08-18 00:47:45',
                'updated_at' => '2021-08-18 00:47:45',
                'deleted_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'Perú',
                'slug' => 'peru',
                'created_at' => '2021-08-18 00:48:06',
                'updated_at' => '2021-08-18 00:48:06',
                'deleted_at' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'Paraguay',
                'slug' => 'paraguay',
                'created_at' => '2021-08-18 00:48:43',
                'updated_at' => '2021-08-18 00:48:43',
                'deleted_at' => NULL,
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'Uruguay',
                'slug' => 'uruguay',
                'created_at' => '2021-08-18 00:49:04',
                'updated_at' => '2021-08-18 00:49:04',
                'deleted_at' => NULL,
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'Venezuela',
                'slug' => 'venezuela',
                'created_at' => '2021-08-18 00:49:26',
                'updated_at' => '2021-08-18 00:49:26',
                'deleted_at' => NULL,
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'México',
                'slug' => 'mexico',
                'created_at' => '2021-08-18 00:49:56',
                'updated_at' => '2021-08-18 00:49:56',
                'deleted_at' => NULL,
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'Canadá',
                'slug' => 'canada',
                'created_at' => '2021-08-18 00:50:19',
                'updated_at' => '2021-08-18 00:50:19',
                'deleted_at' => NULL,
            ),
            12 => 
            array (
                'id' => 13,
                'name' => 'Estado Unidos',
                'slug' => 'estado-unidos',
                'created_at' => '2021-08-18 00:50:41',
                'updated_at' => '2021-08-18 00:50:41',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}