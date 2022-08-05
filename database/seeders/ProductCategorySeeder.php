<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_categories')->insert([
            [ 'product_category' =>"Pizza", 'product_category_image' => "/images/pizza.png", "created_at" => Carbon::now()->toDateTimeString()],
            [ 'product_category' =>"Burger", 'product_category_image' => "/images/burger.png", "created_at" => Carbon::now()->toDateTimeString()]
        ]);
    }
}
