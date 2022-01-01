<?php

namespace Database\Seeders;

use App\Models\AboutPage;
use Illuminate\Database\Seeder;

class AboutPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AboutPage::create([
            'image' => 'public/about/about.jpg',
            'note' => '30 YEARS OF EXPERIENCE',
            'heading' => 'Preparing For Your Success. Provide Best IT Solutions',
            'subheading' => 'Voice and Data Systems are crucial to the success or failure of most businesses. any companies provide laptops, cell phones.',
            'description' => 'The standard chunk of Lorem Ipsum used since the 1500s is and reproduced below for those interested. Sections 1.10.32 and also 1.10.33 from “de Finibus Bonorum et Malorum" by Cicero are alse reproduced in their exact original form, accompanied. The standard chunk of Lorem Ipsum used since the 1500s is and reproduced below for those interested'
        ]);
    }
}
