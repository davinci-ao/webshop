<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
//add to seed pages
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $category_names = ["instruments", "drumkits", "plugins", "laptops"];
        for ($i=0; $i < 3; $i++) { 
            DB::table('categories')->insert([
                "name" => $category_names[$i],
            ]);
        }
    }
}
