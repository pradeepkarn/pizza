<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
   /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Sample user data
        $users = [
            [
                'name' => 'Pradeep Karn',
                'email' => 'mail2pkarn@gmail.com',
                'password' => Hash::make('Admin@123'),
                'created_at' => gmdate('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Suresh Jain',
                'email' => 'pkarn@live.in',
                'password' => Hash::make('Password123'),
                'created_at' => gmdate('Y-m-d H:i:s'),
            ],
            // Add more users as needed
        ];

        // Insert the data into the 'users' table
        DB::table('users')->insert($users);
    }
}
