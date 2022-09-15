<?php

namespace Database\Seeders;

use App\Domain\Category\Category;
use App\Domain\City\City;
use App\Domain\Product\Product;
use Illuminate\Database\Seeder;

class ProductWithCategoryAndCiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $cities = City::factory(30)->create();
        $categories = Category::factory(100)->create();

        $products = Product::factory(50000)->create();


        $products->each(function ($product) use ($cities, $categories) {
            $product->cities()->attach(
                $cities->random(rand(1, 3))->pluck('id')->toArray()
            );
            $product->categories()->attach(
                $categories->random(rand(1, 3))->pluck('id')->toArray()
            );
        });
    }
}
