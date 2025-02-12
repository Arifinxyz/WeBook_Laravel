<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
              'name' => 'admin',
              'email' => 'admin@gmail.com',
              'password' => bcrypt('admin'),
              'role_id' => 1,
            ],
            [
            'name' => 'user',
            'email' => 'user@gmail.com',
            'password' => bcrypt('user'),
            'role_id' => 0,
          ],
        ]);
    }
}
