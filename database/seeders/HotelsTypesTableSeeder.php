<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class HotelsTypesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('hotels_types')->delete();
        
        \DB::table('hotels_types')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Hotel',
                'slug' => 'hotel',
                'description' => NULL,
                'created_at' => '2021-08-18 10:30:39',
                'updated_at' => '2021-08-18 10:31:06',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Residencial',
                'slug' => 'residencial',
                'description' => NULL,
                'created_at' => '2021-08-18 10:30:46',
                'updated_at' => '2021-08-18 10:30:46',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Hostal',
                'slug' => 'hostal',
                'description' => NULL,
                'created_at' => '2021-08-18 10:31:23',
                'updated_at' => '2021-08-18 10:31:23',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}