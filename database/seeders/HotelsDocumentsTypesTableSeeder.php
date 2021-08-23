<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class HotelsDocumentsTypesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('hotels_documents_types')->delete();
        
        \DB::table('hotels_documents_types')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'SIRETUR',
                'description' => NULL,
                'created_at' => '2021-08-23 08:36:07',
                'updated_at' => '2021-08-23 08:36:07',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Código departamental',
                'description' => NULL,
                'created_at' => '2021-08-23 08:37:18',
                'updated_at' => '2021-08-23 08:37:18',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Licencia de funcionamiento',
                'description' => NULL,
                'created_at' => '2021-08-23 08:37:32',
                'updated_at' => '2021-08-23 08:37:32',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}