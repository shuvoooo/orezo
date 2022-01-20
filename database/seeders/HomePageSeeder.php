<?php

namespace Database\Seeders;

use App\Models\HomePage;
use Illuminate\Database\Seeder;

class HomePageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        HomePage::create([
            'title' => 'Data Analytics/Techniques with/Detox Systems./Data Marketing/Data Services',
            'description' => 'eTaxPlanner real-time data management etaxplannerlogies, global data science, and award-winning customer service make our unstacked data solutions dreamit authors team member.',
            'youtube_url' => 'https://youtu.be/BS4TUd7FJSg',
            'counters' => [
                'clients' => '100',
                'years_in_business' => '10',
                'tax_prepared' => '30',
                'staff_members' => '10',
            ],
            'info' => [
                [
                    'icon' => 'laptop',
                    'title' => 'Machine Learning',
                    'description' => 'We are a team of data scientists, data engineers, and data scientists. We are a team of data scientists, data engineers, and data scientists.',
                    'url' => '#'
                ], [
                    'icon' => 'bullseye',
                    'title' => 'Manage Analytics',
                    'description' => 'We are a team of data scientists, data engineers, and data scientists. We are a team of data scientists, data engineers, and data scientists.',
                    'url' => '#'
                ], [
                    'icon' => 'life-ring',
                    'title' => 'Business Intelligence',
                    'description' => 'We are a team of data scientists, data engineers, and data scientists. We are a team of data scientists, data engineers, and data scientists.',
                    'url' => '#'
                ],
            ],
        ]);
    }
}
