<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class CustomerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('users')->insert([
            'email' => "quynh00111222@gmail.com",
            'name' => "quynh",
            'password' => bcrypt('123456'),
            ]
        );
    }
}
