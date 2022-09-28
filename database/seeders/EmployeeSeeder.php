<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Model\Employee;
use DB;
class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('employees')->insert([
            'email' => 'quynh@gmail.com',
            'password' => '12122001',
        ]);
        //Employee::create(['email'=>'quynh@gmail.com', 'password'=> '12122001']);
    }
}
