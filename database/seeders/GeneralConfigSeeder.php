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
            'name' => "Company Address",
            'key' => 'company_address',
            'value' => '54/1 New sorini Asut, Melbord Austria',
        ]);


        GeneralConfig::create([
            'name' => 'Operating Hours',
            'key' => 'operating_hours',
            'value' => 'Mon - Thu: 10:00am - 05:00pm',
        ]);

        GeneralConfig::create([
            'name' => 'Contact Email',
            'key' => 'contact_email',
            'value' => 'demo@example.com',
        ]);

        GeneralConfig::create([
            'name' => 'Contact Phone',
            'key' => 'contact_phone',
            'value' => '54786547521',
        ]);

        GeneralConfig::create([
            'name' => "Company Short Description",
            'key' => 'company_short_description',
            'value' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quisquam, quos.',
        ]);

        GeneralConfig::create([
            'name' => "Company Description",
            'key' => 'company_description',
            'value' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quisquam, quos.',
        ]);

        GeneralConfig::create([
            'name' => "Facebook Link",
            'key' => 'facebook_link',
            'value' => 'https://www.facebook.com/',
        ]);

        GeneralConfig::create([
            'name' => "Twitter Link",
            'key' => 'twitter_link',
            'value' => 'https://www.twitter.com/',
        ]);

        GeneralConfig::create([
            'name' => "Instagram Link",
            'key' => 'instagram_link',
            'value' => 'https://www.instagram.com/',
        ]);

        GeneralConfig::create([
            'name' => "Linkedin Link",
            'key' => 'linkedin_link',
            'value' => 'https://www.linkedin.com/',
        ]);

        GeneralConfig::create([
            'name' => "Copyright Text",
            'key' => 'copyright_text',
            'value' => 'Copyright © 2022. All rights reserved.',
        ]);


        GeneralConfig::create([
            'name' => "Footer Text",
            'key' => 'footer_text',
            'value' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quisquam, quos.',
        ]);

    }
}
