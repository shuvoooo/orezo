<?php

namespace Database\Seeders;

use App\Models\GeneralConfig;
use Illuminate\Database\Seeder;

class GeneralConfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        GeneralConfig::create([
            'key' => 'notification',
            'value' => 'Hello This is a notification',
        ]);

        GeneralConfig::create([
            'key' => 'help center',
            'value' => 'success',
        ]);
    }
}
