<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShelfsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('shelfs')->insert([
            'warehouse_id'=>'1',
            'name'=>'1-tokcha',
        ]);
        DB::table('shelfs')->insert([
            'warehouse_id'=>'1',
            'name'=>'2-tokcha',
        ]);
        DB::table('shelfs')->insert([
            'warehouse_id'=>'1',
            'name'=>'3-tokcha',
        ]);
        DB::table('shelfs')->insert([
            'warehouse_id'=>'2',
            'name'=>'1-tokcha',
        ]);
        DB::table('shelfs')->insert([
            'warehouse_id'=>'2',
            'name'=>'2-tokcha',
        ]);
    }
}
