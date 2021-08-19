<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class HotelsCategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('hotels_categories')->delete();
        
        \DB::table('hotels_categories')->insert(array (
            0 => 
            array (
                'id' => 1,
                'hotels_type_id' => 1,
                'name' => '5 estrellas',
                'description' => NULL,
                'created_at' => '2021-08-18 10:30:02',
                'updated_at' => '2021-08-19 09:26:51',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'hotels_type_id' => 1,
                'name' => '4 estrellas',
                'description' => NULL,
                'created_at' => '2021-08-18 10:30:10',
                'updated_at' => '2021-08-19 09:27:17',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'hotels_type_id' => 1,
                'name' => '3 estrellas',
                'description' => NULL,
                'created_at' => '2021-08-18 10:30:21',
                'updated_at' => '2021-08-19 09:27:25',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'hotels_type_id' => 1,
                'name' => '2 estrellas',
                'description' => NULL,
                'created_at' => '2021-08-19 09:30:35',
                'updated_at' => '2021-08-19 09:30:35',
                'deleted_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'hotels_type_id' => 1,
                'name' => '1 estrella',
                'description' => NULL,
                'created_at' => '2021-08-19 09:30:55',
                'updated_at' => '2021-08-19 09:30:55',
                'deleted_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'hotels_type_id' => 2,
                'name' => '5 estrellas',
                'description' => NULL,
                'created_at' => '2021-08-19 09:31:13',
                'updated_at' => '2021-08-19 09:33:03',
                'deleted_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'hotels_type_id' => 2,
                'name' => '4 estrellas',
                'description' => NULL,
                'created_at' => '2021-08-19 09:31:26',
                'updated_at' => '2021-08-19 09:33:10',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}