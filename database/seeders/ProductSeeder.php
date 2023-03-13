<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
//add to seed pages
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            [
                "name" => "AKAI Professional MPK Mini Plus",
                "description" => "Klein; wel zo fijn.",
                "price" => 399,
                "file_path" => "keyboard.jpg",
                "category_id" => 1,
            ],
            [
                "name" => "Devine EZ-Creator Key XL",
                "description" => "In de EZ-Creator serie is de Devine EZ-Creator Key XL momenteel het grootste USB/MIDI keyboard. Een compact keyboard met 49 toetsen, handig om mee te produceren, bijvoorbeeld met de meegeleverde DAW Bitwig 8-Track.",
                "price" => 65,
                "file_path" => "AKAI Professional MPK Mini Plus.jpg",
                "category_id" => 1,
            ],
            [
                "name" => "Devine EZ-Creator Key XL",
                "description" => "In de EZ-Creator serie is de Devine EZ-Creator Key XL momenteel het grootste USB/MIDI keyboard. Een compact keyboard met 49 toetsen, handig om mee te produceren, bijvoorbeeld met de meegeleverde DAW Bitwig 8-Track.",
                "price" => 65,
                "file_path" => "AKAI Professional MPK Mini Plus.jpg",
                "category_id" => 1,
            ],
        ]);
        //Product::factory()->count(25)->create();
    }
}
