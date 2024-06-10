<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@laksana.com',
            'password' => Hash::make('laksana'), // Ganti 'password' dengan kata sandi yang diinginkan
            'role' => 'admin',
            'remember_token' => Str::random(10),
        ]);
    }
}
