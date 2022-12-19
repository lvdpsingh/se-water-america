<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('users')->insert([
            'role_id' => '1',
            'name' => 'Admin-Lovedeep',
            //'username' => 'Admin-Lovedeep',
            'email' => 'admin@wateramerica.com',
            'password' => bcrypt('admin@1234')
         ]);

        DB::table('users')->insert([
            'role_id' => '2',
            'name' => 'John Doe',
            //'username' => 'Customer-John',
            'email' => 'john.doe@wateramerica.com',
            'password' => bcrypt('john@1234')
        ]);
    }
}
