<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WerehouseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ware_houses')->insert([
            'name'=>'1-ombor',
        ]);
        DB::table('ware_houses')->insert([
        'name'=>'2-ombor',
    ]);
    }
}
