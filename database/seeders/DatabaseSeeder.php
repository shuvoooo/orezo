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

        HomePage::create([
            'title' => 'Data Analytics/Techniques with/Detox Systems./Data Marketing/Data Services',
            'description' => 'Techno real-time data management technologies, global data science, and award-winning customer service make our unstacked data solutions dreamit authors team member.',
            'youtube_url' => 'https://youtu.be/BS4TUd7FJSg',
            'happy_clients' => '19+',
            'total_accounts' => '1240+',
            'total_projects' => '13K',
            'winning_awards' => '999+',
            'info' => [
                [
                    'icon' => 'fa fa-laptop',
                    'title' => 'Machine Learning',
                    'description' => 'We are a team of data scientists, data engineers, and data scientists. We are a team of data scientists, data engineers, and data scientists.',
                    'url' => '#'
                ], [
                    'icon' => 'fa fa-bullseye',
                    'title' => 'Manage Analytics',
                    'description' => 'We are a team of data scientists, data engineers, and data scientists. We are a team of data scientists, data engineers, and data scientists.',
                    'url' => '#'
                ], [
                    'icon' => 'fa fa-life-ring',
                    'title' => 'Business Intelligence',
                    'description' => 'We are a team of data scientists, data engineers, and data scientists. We are a team of data scientists, data engineers, and data scientists.',
                    'url' => '#'
                ],
            ],
        ]);
    }
}
