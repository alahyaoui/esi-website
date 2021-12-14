<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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
            'email' => "54247@gmail.com",
            'password' => Hash::make("dewdew"),
            'is_student' => true,
            'demande_inscription' => true
        ]);
        DB::table('users')->insert([
            'email' => "admin@gmail.com",
            'password' => Hash::make("admin"),
            'is_admin' => true,
            'is_student' => false
        ]);
        DB::table('users')->insert([
            'email' => "secretaire@gmail.com",
            'password' => Hash::make("esipov"),
            'is_secretary' => true,
            'is_student' => false
        ]);
    }
}
