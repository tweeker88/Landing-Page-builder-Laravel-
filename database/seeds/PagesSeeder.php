<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => "home",
                'alias' => 'home',
                'text' => '<h2>We create <strong>awesome</strong> web templates</h2>
                            <p>Lorem Ipsum - это текст-рыба, часто используемый в печати и вэб-дизайне. Lorem Ipsum является стандартной рыбой для текстов на латинице с начала XVI века.</p>',
                'img' => 'main_device_image.png'
            ],
            [
                'name' => "about us",
                'alias' => 'aboutUs',
                'text' => '<h3>Lorem Ipsum - это текст-рыба</h3>
                            <p>Lorem Ipsum - это текст-рыба, часто используемый в печати и вэб-дизайне. Lorem Ipsum является стандартной рыбой для текстов на латинице с начала XVI века.</p>
                            <p>Lorem Ipsum - это текст-рыба, часто используемый в печати и вэб-дизайне. Lorem Ipsum является стандартной рыбой для текстов на латинице с начала XVI века.</p>',
                'img' => 'about-img.jpg'
            ]
        ];
        DB::table('pages')->insert($data);
    }
}
