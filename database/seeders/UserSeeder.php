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

        DB::table('users')->insert([
            'name' => 'Dummy User 3',
            'email' => 'dummyuser3@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'user',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('users')->insert([
            'name' => 'Dummy User 4',
            'email' => 'dummyuser4@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'user',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('users')->insert([
            'name' => 'Dummy User 5',
            'email' => 'dummyuser5@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'user',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('users')->insert([
            'name' => 'Dummy User 6',
            'email' => 'dummyuser6@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'user',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('users')->insert([
            'name' => 'Dummy User 7',
            'email' => 'dummyuser7@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'user',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('users')->insert([
            'name' => 'Dummy User 8',
            'email' => 'dummyuser8@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'user',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('users')->insert([
            'name' => 'Dummy User 9',
            'email' => 'dummyuser9@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'user',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('users')->insert([
            'name' => 'Dummy User 10',
            'email' => 'dummyuser10@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'user',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('users')->insert([
            'name' => 'Dummy User 11',
            'email' => 'dummyuser11@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'user',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('users')->insert([
            'name' => 'Dummy User 12',
            'email' => 'dummyuser12@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'user',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
