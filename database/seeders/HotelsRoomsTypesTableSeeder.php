<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class HotelsRoomsTypesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('hotels_rooms_types')->delete();
        
        \DB::table('hotels_rooms_types')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Simple',
                'slug' => 'simple',
                'description' => NULL,
                'created_at' => '2021-08-18 01:04:26',
                'updated_at' => '2021-08-18 01:04:26',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Doble',
                'slug' => 'doble',
                'description' => NULL,
                'created_at' => '2021-08-18 01:04:45',
                'updated_at' => '2021-08-18 01:04:45',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Triple',
                'slug' => 'triple',
                'description' => NULL,
                'created_at' => '2021-08-18 01:04:58',
                'updated_at' => '2021-08-18 01:04:58',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Suit',
                'slug' => 'suit',
                'description' => NULL,
                'created_at' => '2021-08-18 01:05:13',
                'updated_at' => '2021-08-18 01:05:13',
                'deleted_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Cuádruple',
                'slug' => 'cuadruple',
                'description' => NULL,
                'created_at' => '2021-08-18 01:05:43',
                'updated_at' => '2021-08-18 01:05:43',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}