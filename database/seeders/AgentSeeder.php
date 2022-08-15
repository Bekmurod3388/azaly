<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AgentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('agents')->insert([
            'name'=>'Admin',
        ]);
        DB::table('agents')->insert([
            'name'=>'Fayzullohon',
        ]);
        DB::table('agents')->insert([
            'name'=>'Diyorbek',
        ]);
        DB::table('agents')->insert([
            'name'=>'Ozodbek',
        ]);
        DB::table('agents')->insert([
            'name'=>'Asadbek',
        ]);
        DB::table('agents')->insert([
            'name'=>'Sanjar',
        ]);
    }
}
