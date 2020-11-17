<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'name' => 'Songesand',
            'price' => 149,
            'material' => 'Dub',
            'colors' => '["hnedá"]',
            'width' => 140,
            'height' => NULL,
            'length' => 200,
            'number_of_packs' => 1,
            'description' => 'Nezmontované',
            'advantages' => '["new","best_selling"]',
            'images' => '["/imgs/bedroom/ikea_bed_1_1.webp","/imgs/bedroom/ikea_bed_1_2.webp","/imgs/bedroom/ikea_bed_1_3.webp","/imgs/bedroom/ikea_bed_1_4.webp"]',
            'category_id' => 3
        ]);

        DB::table('products')->insert([
            'name' => 'Dunvik',
            'price' => 981,
            'material' => 'Čalunená posteľ',
            'colors' => '["šedá"]',
            'width' => 160,
            'height' => NULL,
            'length' => 200,
            'number_of_packs' => 1,
            'description' => 'Nezmontované',
            'advantages' => '["new","add_product"]',
            'images' => '["/imgs/bedroom/ikea_bed_2_1.webp","/imgs/bedroom/ikea_bed_2_2.webp","/imgs/bedroom/ikea_bed_2_3.webp","/imgs/bedroom/ikea_bed_2_4.webp"]',
            'category_id' => 3
        ]);

        DB::table('products')->insert([
            'name' => 'Hemnes',
            'price' => 329,
            'material' => 'Rám postele Lönset',
            'colors' => '["biela"]',
            'width' => 180,
            'height' => NULL,
            'length' => 200,
            'number_of_packs' => 1,
            'description' => 'Nezmontované',
            'advantages' => '["new","best_selling"]',
            'images' => '["/imgs/bedroom/ikea_bed_3_1.webp","/imgs/bedroom/ikea_bed_3_2.webp","/imgs/bedroom/ikea_bed_3_3.webp","/imgs/bedroom/ikea_bed_3_4.webp"]',
            'category_id' => 3
        ]);

        DB::table('products')->insert([
            'name' => 'Hauga',
            'price' => 179,
            'material' => 'Čalunená posteľný rám',
            'colors' => '["šedá"]',
            'width' => 160,
            'height' => NULL,
            'length' => 200,
            'number_of_packs' => 1,
            'description' => 'Zmontované',
            'advantages' => '["new","add_product"]',
            'images' => '["/imgs/bedroom/ikea_bed_4_1.webp","/imgs/bedroom/ikea_bed_4_2.webp","/imgs/bedroom/ikea_bed_4_3.webp","/imgs/bedroom/ikea_bed_4_4.webp"]',
            'category_id' => 3
        ]);

        DB::table('products')->insert([
            'name' => 'Songesand Big',
            'price' => 301,
            'material' => 'Rám postele Lönset',
            'colors' => '["hnedá"]',
            'width' => 180,
            'height' => NULL,
            'length' => 200,
            'number_of_packs' => 1,
            'description' => 'Nezmontované',
            'advantages' => '["best_selling"]',
            'images' => '["/imgs/bedroom/ikea_bed_5_1.webp","/imgs/bedroom/ikea_bed_5_2.webp","/imgs/bedroom/ikea_bed_5_3.webp","/imgs/bedroom/ikea_bed_5_4.webp"]',
            'category_id' => 3
        ]);

        DB::table('products')->insert([
            'name' => 'Sagstua',
            'price' => 259,
            'material' => 'Rám postele Leirsund',
            'colors' => '["čierna"]',
            'width' => 160,
            'height' => NULL,
            'length' => 200,
            'number_of_packs' => 1,
            'description' => 'Zmontované',
            'advantages' => '["new"]',
            'images' => '["/imgs/bedroom/ikea_bed_6_1.webp","/imgs/bedroom/ikea_bed_6_2.webp","/imgs/bedroom/ikea_bed_6_3.webp","/imgs/bedroom/ikea_bed_6_4.webp"]',
            'category_id' => 3
        ]);

        DB::table('products')->insert([
            'name' => 'Hauga Small',
            'price' => 209,
            'material' => 'Čalunená posteľ',
            'colors' => '["šedá"]',
            'width' => 140,
            'height' => NULL,
            'length' => 200,
            'number_of_packs' => 1,
            'description' => 'Nezmontované',
            'advantages' => '["add_product"]',
            'images' => '["/imgs/bedroom/ikea_bed_7_1.webp","/imgs/bedroom/ikea_bed_7_2.webp","/imgs/bedroom/ikea_bed_7_3.webp","/imgs/bedroom/ikea_bed_7_4.webp"]',
            'category_id' => 3
        ]);

        DB::table('products')->insert([
            'name' => 'Hemnes',
            'price' => 299,
            'material' => 'Rám rozkladacej postele s 3 zásuvkami',
            'colors' => '["biela"]',
            'width' => 80,
            'height' => NULL,
            'length' => 200,
            'number_of_packs' => 1,
            'description' => 'Nezmontované',
            'advantages' => '["new"]',
            'images' => '["/imgs/bedroom/ikea_bed_9_1.webp","/imgs/bedroom/ikea_bed_9_2.webp","/imgs/bedroom/ikea_bed_9_3.webp","/imgs/bedroom/ikea_bed_9_4.webp"]',
            'category_id' => 3
        ]);

        DB::table('products')->insert([
            'name' => 'Neiden',
            'price' => 46.99,
            'material' => 'Rám postele borovica',
            'colors' => '["hnedá"]',
            'width' => 90,
            'height' => NULL,
            'length' => 200,
            'number_of_packs' => 1,
            'description' => 'Nezmontované',
            'advantages' => '["best_selling"]',
            'images' => '["/imgs/bedroom/ikea_bed_8_1.webp","/imgs/bedroom/ikea_bed_8_2.webp","/imgs/bedroom/ikea_bed_8_3.webp","/imgs/bedroom/ikea_bed_8_4.webp"]',
            'category_id' => 3
        ]);

        DB::table('products')->insert([
            'name' => 'Malm',
            'price' => 178,
            'material' => 'Rám postele Leirsund',
            'colors' => '["čierna"]',
            'width' => 90,
            'height' => NULL,
            'length' => 200,
            'number_of_packs' => 1,
            'description' => 'Nezmontované',
            'advantages' => '["new"]',
            'images' => '["/imgs/bedroom/ikea_bed_10_1.webp","/imgs/bedroom/ikea_bed_10_2.webp","/imgs/bedroom/ikea_bed_10_3.webp","/imgs/bedroom/ikea_bed_10_4.webp"]',
            'category_id' => 3
        ]);

        $kitchen1 = [
            'name' => 'Enhet',
            'price' => 395.94,
            'material' => 'Imitácia betónu',
            'colors' => '["šedá"]',
            'width' => 223,
            'height' => 63.5,
            'length' => 222,
            'number_of_packs' => 2,
            'description' => 'Nezmontované',
            'advantages' => '["new"]',
            'images' => '["/imgs/kitchen/ikea_kitchen_1_1.webp","/imgs/kitchen/ikea_kitchen_1_2.webp","/imgs/kitchen/ikea_kitchen_1_3.webp","/imgs/kitchen/ikea_kitchen_1_4.webp"]',
            'category_id' => 1
        ];

        $kitchen2 = [
            'name' => 'Knoxhult',
            'price' => 175.98,
            'material' => 'Imitácia betónu',
            'colors' => '["biela"]',
            'width' => 180,
            'height' => 61,
            'length' => 220,
            'number_of_packs' => 2,
            'description' => 'Nezmontované',
            'advantages' => '["add_product"]',
            'images' => '["/imgs/kitchen/ikea_kitchen_2_1.webp","/imgs/kitchen/ikea_kitchen_2_2.webp","/imgs/kitchen/ikea_kitchen_2_3.webp","/imgs/kitchen/ikea_kitchen_2_4.webp"]',
            'category_id' => 1
        ];

        $living_room1 = [
            'name' => 'Gravliken',
            'price' => 279,
            'material' => 'Rozkladacia 3-pohovka',
            'colors' => '["šedá"]',
            'width' => 86,
            'height' => 74,
            'length' => 225,
            'number_of_packs' => 1,
            'description' => 'Nezmontované',
            'advantages' => '["add_product"]',
            'images' => '["/imgs/living_room/ikea_living_room_1_1.webp","/imgs/living_room/ikea_living_room_1_2.webp","/imgs/living_room/ikea_living_room_1_3.webp","/imgs/living_room/ikea_living_room_1_4.webp"]',
            'category_id' => 2
        ];

        $living_room2 = [
            'name' => 'Kivik',
            'price' => 899,
            'material' => 'Grann/Bomstad',
            'colors' => '["čierna"]',
            'width' => 95,
            'height' => 83,
            'length' => 227,
            'number_of_packs' => 1,
            'description' => 'Nezmontované',
            'advantages' => '["best_selling","add_product","new"]',
            'images' => '["/imgs/living_room/ikea_living_room_2_1.webp","/imgs/living_room/ikea_living_room_2_2.webp","/imgs/living_room/ikea_living_room_2_3.webp","/imgs/living_room/ikea_living_room_2_4.webp"]',
            'category_id' => 2
        ];

        $bathroom1 = [
            'name' => 'Voxnan',
            'price' => 39.99,
            'material' => 'Pochrómované',
            'colors' => '["šedá"]',
            'width' => 9,
            'height' => 68,
            'length' => 150,
            'number_of_packs' => 1,
            'description' => 'Nezmontované',
            'advantages' => '["best_selling"]',
            'images' => '["/imgs/bathroom/ikea_bathroom_1_1.webp","/imgs/bathroom/ikea_bathroom_1_2.webp","/imgs/bathroom/ikea_bathroom_1_3.webp","/imgs/bathroom/ikea_bathroom_1_4.webp"]',
            'category_id' => 4
        ];

        $bathroom2 = [
            'name' => 'Brogrund',
            'price' => 179,
            'material' => 'Pochrómované',
            'colors' => '["šedá"]',
            'width' => 30,
            'height' => 117,
            'length' => 150,
            'number_of_packs' => 1,
            'description' => 'Nezmontované',
            'advantages' => '["new"]',
            'images' => '["/imgs/bathroom/ikea_bathroom_2_1.webp","/imgs/bathroom/ikea_bathroom_2_2.webp","/imgs/bathroom/ikea_bathroom_2_3.webp","/imgs/bathroom/ikea_bathroom_2_4.webp"]',
            'category_id' => 4
        ];

        $working_room1 = [
            'name' => 'Malm',
            'price' => 139,
            'material' => 'dub',
            'colors' => '["hnedá"]',
            'width' => 73,
            'height' => 73,
            'length' => 140,
            'number_of_packs' => 1,
            'description' => 'Nezmontované',
            'advantages' => '["add_product"]',
            'images' => '["/imgs/working_room/ikea_working_room_1_1.webp","/imgs/working_room/ikea_working_room_1_2.webp","/imgs/working_room/ikea_working_room_1_3.webp","/imgs/working_room/ikea_working_room_1_4.webp"]',
            'category_id' => 5
        ];

        $working_room2 = [
            'name' => 'Bekant',
            'price' => 149,
            'material' => 'dub',
            'colors' => '["hnedá","čierna"]',
            'width' => 80,
            'height' => 65,
            'length' => 120,
            'number_of_packs' => 1,
            'description' => 'Nezmontované',
            'advantages' => '["new"]',
            'images' => '["/imgs/working_room/ikea_working_room_2_1.webp","/imgs/working_room/ikea_working_room_2_2.webp","/imgs/working_room/ikea_working_room_2_3.webp","/imgs/working_room/ikea_working_room_2_4.webp"]',
            'category_id' => 5
        ];

        $garden1 = [
            'name' => 'Saltholmne',
            'price' => 64.94,
            'material' => 'stôl a 2 stoličky',
            'colors' => '["šedá"]',
            'width' => 90,
            'height' => 65,
            'length' => 156,
            'number_of_packs' => 1,
            'description' => 'Zmontované',
            'advantages' => '["new"]',
            'images' => '["/imgs/garden/ikea_garden_1_1.webp","/imgs/garden/ikea_garden_1_2.webp","/imgs/garden/ikea_garden_1_3.webp","/imgs/garden/ikea_garden_1_4.webp"]',
            'category_id' => 6
        ];

        $garden2 = [
            'name' => 'Sjalland',
            'price' => 510.94,
            'material' => 'stôl a 4 stoličky',
            'colors' => '["hnedá","šedá"]',
            'width' => 90,
            'height' => 65,
            'length' => 156,
            'number_of_packs' => 2,
            'description' => 'Zmontované',
            'advantages' => '["best_selling"]',
            'images' => '["/imgs/garden/ikea_garden_2_1.webp","/imgs/garden/ikea_garden_2_2.webp","/imgs/garden/ikea_garden_2_3.webp","/imgs/garden/ikea_garden_2_4.webp"]',
            'category_id' => 6
        ];

        for ($i = 0; $i < 12; $i++) {
            if ($i % 2 == 0) {
                DB::table('products')->insert($kitchen1);
                DB::table('products')->insert($living_room1);
                DB::table('products')->insert($bathroom1);
                DB::table('products')->insert($working_room1);
                DB::table('products')->insert($garden1);
            } else {
                DB::table('products')->insert($kitchen2);
                DB::table('products')->insert($living_room2);
                DB::table('products')->insert($bathroom2);
                DB::table('products')->insert($working_room2);
                DB::table('products')->insert($garden2);
            }
        }
    }
}
