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
        $product1 = [
            'name' => 'Songesand',
            'price' => 149,
            'material' => 'Dub',
            'colors' => '["hnedá","biela"]',
            'width' => 140,
            'height' => NULL,
            'length' => 200,
            'number_of_packs' => 1,
            'description' => 'Nezmontované',
            'advantages' => '["new","best_selling"]',
            'images' => '["/imgs/bedroom/ikea_bed_1_1.webp","/imgs/bedroom/ikea_bed_1_2.webp","/imgs/bedroom/ikea_bed_1_3.webp","/imgs/bedroom/ikea_bed_1_4.webp"]',
            'category_id' => 3
        ];

        $product2 = [
            'name' => 'Dunvik',
            'price' => 981,
            'material' => 'Čalunená posteľ',
            'colors' => '["šedá","biela"]',
            'width' => 160,
            'height' => NULL,
            'length' => 200,
            'number_of_packs' => 1,
            'description' => 'Nezmontované',
            'advantages' => '["new","add_product"]',
            'images' => '["/imgs/bedroom/ikea_bed_2_1.webp","/imgs/bedroom/ikea_bed_2_2.webp","/imgs/bedroom/ikea_bed_2_3.webp","/imgs/bedroom/ikea_bed_2_4.webp"]',
            'category_id' => 3
        ];

        for ($i = 0; $i < 12; $i++) {
            if ($i % 2 == 0) {
                DB::table('products')->insert($product1);
            } else {
                DB::table('products')->insert($product2);
            }
        }

//        DB::table('products')->insert([
//            'name' => 'Songesand',
//            'price' => 149,
//            'material' => 'Dub',
//            'colors' => '["hnedá"]',
//            'width' => 140,
//            'height' => NULL,
//            'length' => 200,
//            'number_of_packs' => 1,
//            'description' => 'Nezmontované',
//            'sale' => true,
//            'best_selling' => false,
//            'add_product' => true,
//            'images' => '["/imgs/bedroom/ikea_bed_1_1.webp","/imgs/bedroom/ikea_bed_1_2.webp","/imgs/bedroom/ikea_bed_1_3.webp","/imgs/bedroom/ikea_bed_1_4.webp"]',
//            'category_id' => 3
//        ]);
//
//
//        DB::table('products')->insert([
//            'name' => 'Dunvik',
//            'price' => 981,
//            'material' => 'Čalunená posteľ',
//            'colors' => '["šedá"]',
//            'width' => 160,
//            'height' => NULL,
//            'length' => 200,
//            'number_of_packs' => 1,
//            'description' => 'Nezmontované',
//            'sale' => false,
//            'best_selling' => true,
//            'add_product' => true,
//            'images' => '["/imgs/bedroom/ikea_bed_2_1.webp","/imgs/bedroom/ikea_bed_2_2.webp","/imgs/bedroom/ikea_bed_2_3.webp","/imgs/bedroom/ikea_bed_2_4.webp"]',
//            'category_id' => 3
//        ]);
    }
}
