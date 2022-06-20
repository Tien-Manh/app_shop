<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $categories = [
       	[
       		'cate_name' => 'Danh muc 1',
       		'cate_slug' => 'danh-muc-1',
       		'cate_active' => 0
       	],
       	[
       		'cate_name' => 'Danh muc 2',
       		'cate_slug' => 'danh-muc-2',
       		'cate_active' => 0
       	],
       	[
       		'cate_name' => 'Danh muc 3',
       		'cate_slug' => 'danh-muc-3',
       		'cate_active' => 1
       	],
        [
          'cate_name' => 'Danh muc 4',
          'cate_slug' => 'danh-muc-4',
          'cate_active' => 0
        ],
        [
          'cate_name' => 'Danh muc 6',
          'cate_slug' => 'danh-muc-6',
          'cate_active' => 0
        ],
        [
          'cate_name' => 'Danh muc 5',
          'cate_slug' => 'danh-muc-5',
          'cate_active' => 1
        ]
       ];
       DB::table('categories')->insert($categories);
    }
}
