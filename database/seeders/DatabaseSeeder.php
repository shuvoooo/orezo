<?php

namespace Database\Seeders;

use App\Models\HomePage;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(GeneralConfigSeeder::class);
        $this->call(HomePageSeeder::class);
        $this->call(AboutPageSeeder::class);


    }
}
