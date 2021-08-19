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
                'name' => 'Hoteles',
                'slug' => 'hoteles',
                'description' => NULL,
                'created_at' => '2021-08-18 10:30:39',
                'updated_at' => '2021-08-19 09:21:41',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Hoteles boutique',
                'slug' => 'hoteles-boutique',
                'description' => NULL,
                'created_at' => '2021-08-18 10:30:46',
                'updated_at' => '2021-08-19 09:21:58',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Hotel Rural',
                'slug' => 'hotel-rural',
                'description' => NULL,
                'created_at' => '2021-08-18 10:31:23',
                'updated_at' => '2021-08-19 09:22:10',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Hotel Lodge',
                'slug' => 'hotel-lodge',
                'description' => NULL,
                'created_at' => '2021-08-19 09:22:25',
                'updated_at' => '2021-08-19 09:22:25',
                'deleted_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Resort',
                'slug' => 'resort',
                'description' => NULL,
                'created_at' => '2021-08-19 09:22:36',
                'updated_at' => '2021-08-19 09:22:36',
                'deleted_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Hostería',
                'slug' => 'hosteria',
                'description' => NULL,
                'created_at' => '2021-08-19 09:22:46',
                'updated_at' => '2021-08-19 09:22:46',
                'deleted_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'Hostal y Residencial',
                'slug' => 'hostal-y-residencial',
                'description' => NULL,
                'created_at' => '2021-08-19 09:23:00',
                'updated_at' => '2021-08-19 09:23:00',
                'deleted_at' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'Apart Hotel',
                'slug' => 'apart-hotel',
                'description' => NULL,
                'created_at' => '2021-08-19 09:23:16',
                'updated_at' => '2021-08-19 09:23:16',
                'deleted_at' => NULL,
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'Alojamiento',
                'slug' => 'alojamiento',
                'description' => NULL,
                'created_at' => '2021-08-19 09:23:24',
                'updated_at' => '2021-08-19 09:23:24',
                'deleted_at' => NULL,
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'Ecoalbergues',
                'slug' => 'ecoalbergues',
                'description' => NULL,
                'created_at' => '2021-08-19 09:23:35',
                'updated_at' => '2021-08-19 09:23:35',
                'deleted_at' => NULL,
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'Áreas de Camping',
                'slug' => 'areas-de-camping',
                'description' => NULL,
                'created_at' => '2021-08-19 09:23:46',
                'updated_at' => '2021-08-19 09:23:46',
                'deleted_at' => NULL,
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'Consolidadoras',
                'slug' => 'consolidadoras',
                'description' => NULL,
                'created_at' => '2021-08-19 09:23:59',
                'updated_at' => '2021-08-19 09:23:59',
                'deleted_at' => NULL,
            ),
            12 => 
            array (
                'id' => 13,
                'name' => 'Mayoristas y representaciones',
                'slug' => 'mayoristas-y-representaciones',
                'description' => NULL,
                'created_at' => '2021-08-19 09:24:08',
                'updated_at' => '2021-08-19 09:24:08',
                'deleted_at' => NULL,
            ),
            13 => 
            array (
                'id' => 14,
                'name' => 'Agencias de viajes',
                'slug' => 'agencias-de-viajes',
                'description' => NULL,
                'created_at' => '2021-08-19 09:24:15',
                'updated_at' => '2021-08-19 09:24:15',
                'deleted_at' => NULL,
            ),
            14 => 
            array (
                'id' => 15,
                'name' => 'Operadoras',
                'slug' => 'operadoras',
                'description' => NULL,
                'created_at' => '2021-08-19 09:24:21',
                'updated_at' => '2021-08-19 09:24:21',
                'deleted_at' => NULL,
            ),
            15 => 
            array (
                'id' => 16,
                'name' => 'Guías de Turismo',
                'slug' => 'guias-de-turismo',
                'description' => NULL,
                'created_at' => '2021-08-19 09:24:32',
                'updated_at' => '2021-08-19 09:24:32',
                'deleted_at' => NULL,
            ),
            16 => 
            array (
                'id' => 17,
                'name' => 'Gastronómico',
                'slug' => 'gastronomico',
                'description' => NULL,
                'created_at' => '2021-08-19 09:24:40',
                'updated_at' => '2021-08-19 09:24:40',
                'deleted_at' => NULL,
            ),
            17 => 
            array (
                'id' => 18,
                'name' => 'Flotel',
                'slug' => 'flotel',
                'description' => NULL,
                'created_at' => '2021-08-19 09:24:48',
                'updated_at' => '2021-08-19 09:24:48',
                'deleted_at' => NULL,
            ),
            18 => 
            array (
                'id' => 19,
                'name' => 'Transporte turístico',
                'slug' => 'transporte-turistico',
                'description' => NULL,
                'created_at' => '2021-08-19 09:24:58',
                'updated_at' => '2021-08-19 09:24:58',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}