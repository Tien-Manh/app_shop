<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
        	[
        		'product_name' => 'san pham thu 1',
        		'description' => 'description 1',
        		'product_slug' => 'san-pham-1',
        		'price' => '200000',
        		'sell_price' => 0,
        		'image' => '',
        		'thumb_image' => '',
        		'amount' => 10
        	],
        	[
        		'product_name' => 'san pham thu 2',
        		'description' => 'description 2',
        		'product_slug' => 'san-pham-2',
        		'price' => 180000,
        		'sell_price' => 160000,
        		'image' => '',
        		'thumb_image' => '',
        		'amount' => 3
        	],
        	[
        		'product_name' => 'san pham thu 3',
        		'description' => 'description 3',
        		'product_slug' => 'san-pham-3',
        		'price' => 10000,
        		'sell_price' => 8000,
        		'image' => '',
        		'thumb_image' => '',
        		'amount' => 10
        	],
        	[
        		'product_name' => 'san pham thu 4',
        		'description' => 'description 4',
        		'product_slug' => 'san-pham-4',
        		'price' => 500000,
        		'sell_price' => 0,
        		'image' => '',
        		'thumb_image' => '',
        		'amount' => 1
        	],
        	[
        		'product_name' => 'san pham thu 5',
        		'description' => 'description 5',
        		'product_slug' => 'san-pham-5',
        		'price' => '200000',
        		'sell_price' => 0,
        		'image' => '',
        		'thumb_image' => '',
        		'amount' => 2
        	],
        	[
        		'product_name' => 'san pham thu 6',
        		'description' => 'description 6',
        		'product_slug' => 'san-pham-6',
        		'price' => 650000,
        		'sell_price' => 560000,
        		'image' => '',
        		'thumb_image' => '',
        		'amount' => 5
        	]
        ];
        DB::table('products')->insert($products);
    }
}
