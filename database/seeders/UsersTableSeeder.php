<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //criar varios usuarios
        DB::table('users')->insert([
            [
                'username' => 'user1@gmail.com',
                'password' => bcrypt('abc123456'),
                'created_at' => date('y-m-d H:i:s' )
            ],
            [
                'username' => 'user2@gmail.com',
                'password' => bcrypt('abc123456'),
                'created_at' => date('y-m-d H:i:s' )
            ],
            [
                'username' => 'user3@gmail.com',
                'password' => bcrypt('abc123456'),
                'created_at' => date('y-m-d H:i:s' )
            ],
            ]);
    }
}
