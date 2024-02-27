<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{

    public function run()
    {
        DB::table('users')->insert([
            
            [

                'first_name' => 'admin',
                'last_name' => 'name',
                'email' => 'admin@example.com',
                'password' => Hash::make('123456789'),
                'account_type' => 'admin',
                'isMainAdmin' => 1,
                'status' => 1,
      
            ],

            [

                'first_name' => 'user',
                'last_name' => 'name',
                'email' => 'user@example.com',
                'password' => Hash::make('123456789'),
                'account_type' => 'user',
                'isMainAdmin' => 0,
                'status' => 1,
      
            ]
    
    
        ]);
    }
}
