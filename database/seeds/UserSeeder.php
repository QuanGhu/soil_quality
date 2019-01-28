<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
            ['name' => 'Administrator',
             'gender' => 'L',
             'address' => 'administartor address',
             'username' => 'admin',
             'email' => 'admin@email.com',
             'password' => bcrypt('admin123'),
             'user_level_id' => 1
            ]
        );

        DB::table('users')->insert(
            ['name' => 'Customer',
             'gender' => 'L',
             'address' => 'customer address',
             'username' => 'user',
             'email' => 'user@email.com',
             'password' => bcrypt('user123'),
             'user_level_id' => 2
            ]
        );
    }
}
