<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CitiesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('cities')->delete();
        
        \DB::table('cities')->insert(array (
            0 => 
            array (
                'id' => 1,
                'province_id' => 1,
                'name' => 'Guayaramerín',
                'slug' => 'guayaramerin',
                'created_at' => '2021-08-18 01:02:02',
                'updated_at' => '2021-08-18 01:02:02',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'province_id' => 1,
                'name' => 'Riberalta',
                'slug' => 'riberalta',
                'created_at' => '2021-08-18 01:02:49',
                'updated_at' => '2021-08-18 01:02:49',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'province_id' => 5,
                'name' => 'Santísima Trinidad',
                'slug' => 'santisima-trinidad',
                'created_at' => '2021-08-18 01:03:10',
                'updated_at' => '2021-08-18 01:03:10',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}