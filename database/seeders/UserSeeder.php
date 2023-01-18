<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Administrator',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('users')->insert([
            'name' => 'Dummy User',
            'email' => 'dummyuser@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'user',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('users')->insert([
            'name' => 'Dummy User 2',
            'email' => 'dummyuser2@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'user',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
