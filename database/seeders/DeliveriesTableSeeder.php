<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DeliveriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('deliveries')->insert([
            'type'=>'Kuriér'
        ]);
        DB::table('deliveries')->insert([
            'type'=>'Slovenská pošta'
        ]);
        DB::table('deliveries')->insert([
            'type'=>'Osobný odber'
        ]);
    }
}
