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
            "name" => "midi piano",
            "description" => "Klein; wel zo fijn.",
            "category_id" => 1,
        ]);
        Product::factory()->count(25)->create();
    }
}
