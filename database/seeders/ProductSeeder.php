<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [ 'product_category_id' => 1, 'product_name' => "Cheese Pizza", 'product_image' => "/images/cheese-pizza.png", "price" => 100, "created_at" => Carbon::now()->toDateTimeString()],
            [ 'product_category_id' => 1, 'product_name' => "Veggie Pizza", 'product_image' => "/images/veggie-pizza.png", "price" => 120, "created_at" => Carbon::now()->toDateTimeString()],
            [ 'product_category_id' => 1, 'product_name' => "Meat Pizza", 'product_image' => "/images/meat-pizza.png", "price" => 150, "created_at" => Carbon::now()->toDateTimeString()],
            [ 'product_category_id' => 1, 'product_name' => "Margherita Pizza", 'product_image' => "/images/margherita-pizza.png", "price" => 110, "created_at" => Carbon::now()->toDateTimeString()],
            [ 'product_category_id' => 2, 'product_name' => "Beef Burgers", 'product_image' => "/images/beef-burgers.png", "price" => 80, "created_at" => Carbon::now()->toDateTimeString()],
            [ 'product_category_id' => 2, 'product_name' => "Turkey Burgers", 'product_image' => "/images/turkey-burgers.png", "price" => 90, "created_at" => Carbon::now()->toDateTimeString()],
            [ 'product_category_id' => 2, 'product_name' => "Veggie Burgers", 'product_image' => "/images/veggie-burgers.png", "price" => 120, "created_at" => Carbon::now()->toDateTimeString()],
            [ 'product_category_id' => 2, 'product_name' => "Bison Burgers", 'product_image' => "/images/bison-burgers.png", "price" => 110, "created_at" => Carbon::now()->toDateTimeString()],
            [ 'product_category_id' => 2, 'product_name' => "Wild Salmon Burgers", 'product_image' => "/images/wild-salmon-burgers.png", "price" => 140, "created_at" => Carbon::now()->toDateTimeString()],
        ]);
    }
}
