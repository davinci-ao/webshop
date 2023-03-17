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
            //instruments
            [
                "name" => "AKAI Professional MPK Mini Plus",
                "description" => "Klein; wel zo fijn.",
                "price" => 399,
                "file_path" => "AKAI Professional MPK Mini Plus.jpg",
                "category_id" => 1,
                "stock" => 3,
            ],
            [
                "name" => "Devine EZ-Creator Key XL",
                "description" => "In de EZ-Creator serie is de Devine EZ-Creator Key XL momenteel het grootste USB/MIDI keyboard. Een compact keyboard met 49 toetsen, handig om mee te produceren, bijvoorbeeld met de meegeleverde DAW Bitwig 8-Track.",
                "price" => 65,
                "file_path" => "keyboard.jpg",
                "category_id" => 1,
                "stock" => 3,
            ],
            [
                "name" => "AKAI MPK Mini MK3 ",
                "description" => "leuk bordje",
                "price" => 90,
                "file_path" => "akai mpk mini mk3.jpg",
                "category_id" => 1,
                "stock" => 3,
            ],
            [
                "name" => "Devine EZ-Creator Plus",
                "description" => "Duik in de wereld van muziekproductie met de voordelige controllers van Devine, zoals deze EZ-Creator Plus.",
                "price" => 71,
                "file_path" => "Devine EZ-Creator Plus.jpg",
                "category_id" => 1,
                "stock" => 5,
            ],
            [
                "name" => "WORLDE Panda Midi",
                "description" => "Prima dingetje",
                "price" => 122,
                "file_path" => "WORLDE Panda Midi.jpg",
                "category_id" => 1,
                "stock" => 7,
            ],
            [
                "name" => "OMNITRONIC KEY-288 MIDI ",
                "description" => "USB MIDI-controller met 25 knoppen, 8 pads, elk 4 controls en faders, voor muziekmakers, producers en DJ’s.",
                "price" => 105,
                "file_path" => "OMNITRONIC KEY-288 MIDI.jpg",
                "category_id" => 1,
                "stock" => 12,
            ],
            [
                "name" => "Devine EZ-Creator Key",
                "description" => "Een volwaardig keyboard, maar dan in het klein, waardoor deze makkelijk in een rugtas past met je laptop.",
                "price" => 55,
                "file_path" => "Devine EZ-Creator Key.jpg",
                "category_id" => 1,
                "stock" => 2,
            ],
            //drumkits
            [
                "name" => "MULTIVERSE DRUMKIT",
                "description" => "Drumkit with over 230 Unique Sounds and Mixer Presets made by Filppu",
                "price" => 25,
                "file_path" => "multiverse drumkit.jpg",
                "category_id" => 2,
                "stock" => 3,
            ],
            [
                "name" => "OMNITRIX DRUMKIT",
                "description" => "Drumkit with over 150 Unique Sounds and Mixer Presets made by Filppu",
                "price" => 18,
                "file_path" => "OMNITRIX DRUMKIT.jpg",
                "category_id" => 2,
                "stock" => 3,
            ],
            [
                "name" => "BLUE DRAGON DRUMKIT",
                "description" => "Drumkit with over 350 Sounds made by Shxdoww and Filppu",
                "price" => 20,
                "file_path" => "BLUE DRAGON DRUMKIT.jpg",
                "category_id" => 2,
                "stock" => 3,
            ],
            //plugins
            [
                "name" => "SPECTRASONICS OMNISPHERE ",
                "description" => "Omnisphere 2.8 is het vlaggeschip van Spectrasonics. Een instrument met een enorme power en een scala aan verschillende sounds. Een superinspirerende synthesizer die inzetbaar is voor elke type muziek",
                "price" => 389,
                "file_path" => "omnisphere.jpg",
                "category_id" => 3,
                "stock" => 3,
            ],
            [
                "name" => "HalfTime by Cableguys",
                "description" => "Use HalfTime for an instant half-speed effect with zero setup.",
                "price" => 15,
                "file_path" => "halftime.jpg",
                "category_id" => 3,
                "stock" => 3,
            ],
            [
                "name" => "kontakt 7 by Native Instruments",
                "description" => "KONTAKT is everything from instant inspiration for music makers to the industry’s leading instrument-building tool.",
                "price" => 469,
                "file_path" => "kontakt 7.jpg",
                "category_id" => 3,
                "stock" => 3,
            ],
        ]);
        //Product::factory()->count(25)->create();
    }
}
