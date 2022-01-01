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
            'name' => 'Notification',
            'key' => 'notification',
            'value' => 'Hello This is a notification',
        ]);

        GeneralConfig::create([
            'name' => 'Help Center',
            'key' => 'help_center',
            'value' => 'success',
        ]);


        GeneralConfig::create([
            'name' => 'Enter Your Address',
            'key' => 'your_address',
            'value' => '54/1 New sorini Asut, Melbord Austria',
        ]);


        GeneralConfig::create([
            'name' => 'Opening Hours',
            'key' => 'opening_hours',
            'value' => 'Mon - Thu: 10:00am - 05:00pm',
        ]);

        GeneralConfig::create([
            'name' => 'Contact Directly',
            'key' => 'contact_directly',
            'value' => 'demo@example.com, 54786547521',
        ]);
    }
}
