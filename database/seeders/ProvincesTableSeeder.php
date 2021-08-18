<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProvincesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('provinces')->delete();
        
        \DB::table('provinces')->insert(array (
            0 => 
            array (
                'id' => 1,
                'state_id' => 1,
                'name' => 'Vaca Diez',
                'slug' => 'vaca-diez',
                'created_at' => '2021-08-18 00:57:12',
                'updated_at' => '2021-08-18 00:57:12',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'state_id' => 1,
                'name' => 'Mamoré',
                'slug' => 'mamore',
                'created_at' => '2021-08-18 00:57:32',
                'updated_at' => '2021-08-18 00:57:32',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'state_id' => 1,
                'name' => 'Iténez',
                'slug' => 'itenez',
                'created_at' => '2021-08-18 00:58:04',
                'updated_at' => '2021-08-18 00:58:04',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'state_id' => 1,
                'name' => 'Yacuma',
                'slug' => 'yacuma',
                'created_at' => '2021-08-18 00:58:38',
                'updated_at' => '2021-08-18 00:58:38',
                'deleted_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'state_id' => 1,
                'name' => 'Cercado',
                'slug' => 'cercado',
                'created_at' => '2021-08-18 00:59:08',
                'updated_at' => '2021-08-18 00:59:08',
                'deleted_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'state_id' => 1,
                'name' => 'Marbán',
                'slug' => 'marban',
                'created_at' => '2021-08-18 00:59:28',
                'updated_at' => '2021-08-18 00:59:28',
                'deleted_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'state_id' => 1,
                'name' => 'Moxos',
                'slug' => 'moxos',
                'created_at' => '2021-08-18 00:59:44',
                'updated_at' => '2021-08-18 00:59:44',
                'deleted_at' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'state_id' => 1,
                'name' => 'José Ballivián',
                'slug' => 'jose-ballivian',
                'created_at' => '2021-08-18 01:00:08',
                'updated_at' => '2021-08-18 01:00:08',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}