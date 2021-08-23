<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use TCG\Voyager\Traits\Seedable;

class DatabaseSeeder extends Seeder
{
    use Seedable;

    protected $seedersPath = __DIR__.'/';

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(VoyagerDatabaseSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(MenuItemsTableSeeder::class);
        $this->call(DataTypesTableSeeder::class);
        $this->call(DataRowsTableSeeder::class);
        $this->call(SettingsTableSeeder::class);
        $this->call(CountriesTableSeeder::class);
        $this->call(StatesTableSeeder::class);
        $this->call(ProvincesTableSeeder::class);
        $this->call(CitiesTableSeeder::class);
        $this->call(HotelsRoomsTypesTableSeeder::class);
        $this->call(HotelsTypesTableSeeder::class);
        $this->call(HotelsCategoriesTableSeeder::class);
        $this->call(HotelsDocumentsTypesTableSeeder::class);
    }
}
