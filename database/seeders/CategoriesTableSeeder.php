<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
           'name'=>'Kuchyňa'
        ]);
        DB::table('categories')->insert([
            'name'=>'Obývačka'
        ]);
        DB::table('categories')->insert([
            'name'=>'Spálňa'
        ]);
        DB::table('categories')->insert([
            'name'=>'Kúpelňa'
        ]);
        DB::table('categories')->insert([
            'name'=>'Pracovňa'
        ]);
        DB::table('categories')->insert([
            'name'=>'Záhrada'
        ]);
    }
}
