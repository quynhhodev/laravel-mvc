<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'catName' => "Men",
            'slug' => "men",
            'parentId' => 0,
            'description' => 'Men fashion',
            'status' =>'1'
            ]
        );
        DB::table('categories')->insert([
            'catName' => "Women",
            'slug' => "women",
            'parentId' => 0,
            'description' => 'Women fashion',
            'status' =>'1'
            ]
        );
        DB::table('categories')->insert([
            'catName' => "Child",
            'slug' => "child",
            'parentId' => 0,
            'description' => 'Child fashion',
            'status' =>'1'
            ]
        );
    }
}
