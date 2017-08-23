<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PortfolioSeeder extends Seeder
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
                'name' => "Finance App",
                'img' => 'portfolio_pic2.jpg',
                'filter' => 'GPS',
            ],
            [
                'name' => "Concept",
                'img' => 'portfolio_pic3.jpg',
                'filter' => 'design',
            ],
            [
                'name' => "Shopping",
                'img' => 'portfolio_pic4.jpg',
                'filter' => 'android',
            ],
            [
                'name' => "Managment",
                'img' => 'portfolio_pic5.jpg',
                'filter' => 'design',
            ],
            [
                'name' => "iPhone",
                'img' => 'portfolio_pic6.jpg',
                'filter' => 'web',
            ],
            [
                'name' => "Nexus",
                'img' => 'portfolio_pic7.jpg',
                'filter' => 'web',
            ],
            [
                'name' => "Android",
                'img' => 'portfolio_pic8.jpg',
                'filter' => 'android',
            ]

        ];
        DB::table('portfolios')->insert($data);
    }
}
