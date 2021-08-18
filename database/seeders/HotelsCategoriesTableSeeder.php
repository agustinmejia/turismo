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
                'name' => '3 estrellas',
                'slug' => '3-estrellas',
                'description' => NULL,
                'created_at' => '2021-08-18 10:30:02',
                'updated_at' => '2021-08-18 10:30:02',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => '4 estrellas',
                'slug' => '4-estrellas',
                'description' => NULL,
                'created_at' => '2021-08-18 10:30:10',
                'updated_at' => '2021-08-18 10:30:10',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => '5 estrellas',
                'slug' => '5-estrellas',
                'description' => NULL,
                'created_at' => '2021-08-18 10:30:21',
                'updated_at' => '2021-08-18 10:30:21',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}