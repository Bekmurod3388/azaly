<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Psy\Util\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//
        DB::table('categories')->insert([
            'name'=>'kuzgi',
            'slug'=>'kuzgi',
            'img'=>'berdam rasm bo',
            'parent_id'=>'0',

        ]);
        DB::table('categories')->insert([
            'name'=>'yozgi',
            'slug'=>'yozgi',
            'img'=>'rasm bo',
            'parent_id'=>'0',

        ]);
        DB::table('categories')->insert([
            'name'=>'bahorgi',
            'slug'=>'bahorgi',
            'img'=>'rasm bo',
            'parent_id'=>'0',

        ]);
        DB::table('categories')->insert([
            'name'=>'qishki',
            'slug'=>'qishki',
            'img'=>'bo berdam',
            'parent_id'=>'0',

        ]);

    }
}
