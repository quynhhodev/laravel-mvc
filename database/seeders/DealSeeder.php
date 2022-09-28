<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class DealSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('hongocquynhdeals')->insert([
            'title' => "Beatutyful Dress For Women",
            'slug' => "beatutyful-dress-for-women",
            'image' => "img100.jpg",
            'detail' => "RELAXED FIT. With a relaxed fit and mid rise, these pants are a wardrobe necessity",
            'price' => "100",
            'salePrice' => "50",
            'countDown' => "2021/12/12",
            'status' =>"1",
            ]
        );
    }
}
