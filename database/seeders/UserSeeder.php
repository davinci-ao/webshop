<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
//add to seed pages
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            "username" => "honkiplanki",
            "forename" => "honki",
            "lastname" => "planki",
            "email" => "honkiplanki@gmail.com",
            "password" => Hash::make('honkiplanki'),
        ]);
    }
}
