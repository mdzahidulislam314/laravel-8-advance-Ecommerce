<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //category seed
        DB::table('categories')->insert([
            'name_en' => 'Fashion',
            'is_active'=>1,
            'slug_en' => 'fashion'
        ]);
        DB::table('categories')->insert([
            'name_en' => 'Home & Garden',
            'slug_en' => 'home-&-garden',
            'is_active' => 1,
        ]);

        //Sub Category
        DB::table('sub_categories')->insert([
            'name_en' => 'Women',
            'slug_en' => 'women',
            'is_active' => 1,
            'category_id' => 1,
        ]);
        DB::table('sub_categories')->insert([
            'name_en' => 'Bedroom',
            'slug_en' => 'bedroom',
            'is_active' => 1,
            'category_id' => 2,
        ]);

        //Sub Category
        DB::table('inner_categories')->insert([
            'name_en' => 'Jewlery & Watches',
            'slug_en' => 'jewlery-&-watches',
            'is_active' => 1,
            'category_id' => 1,
            'subcategory_id' => 1,
        ]);
        DB::table('inner_categories')->insert([
            'name_en' => 'Nightstands',
            'slug_en' => 'nightstands',
            'is_active' => 1,
            'category_id' => 2,
            'subcategory_id' => 2,
        ]);
    }
}
