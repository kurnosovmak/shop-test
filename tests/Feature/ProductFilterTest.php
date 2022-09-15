<?php

namespace Tests\Feature;

use App\Domain\Category\Category;
use App\Domain\City\City;
use App\Domain\Product\Product;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductFilterTest extends TestCase
{
    use RefreshDatabase;

    protected City $city;
    protected Category $category;
    protected Product $product;

    protected function setUp(): void
    {
        parent::setUp();

    }

    public function test_one_category_pick(): void
    {
        $category = $this->category->factory()->create();
        $category = Category::all()->first();
        $response = $this->get('/?category=' . $category->id);

        $response->assertStatus(200);

        $response = $this->get('/?category=[44,2,3]');

        $response->assertStatus(200);
    }

    public function test_one_or_more_city_by_category(): void
    {
        $this->category->factory()->create();
        $category = Category::all()->first();
        $cities = $this->city->factory(3)->create();

        $products = $this->product->factory(10)->create();
        $products->each(function ($product) use ($cities, $category) {
            $product->cities()->attach(
                $cities->random(rand(1, 3))->pluck('id')->toArray()
            );
            $product->categories()->attach(
                $category->id
            );
        });
        $cities = City::withCategory($category->id)->get();
        $this->assertFalse(count($cities) === 0);
    }

    public function test_city_and_category(): void
    {
        $this->category->factory()->create();
        $category = Category::all()->first();
        $cities = $this->city->factory(3)->create();

        $products = $this->product->factory(10)->create();
        $products->each(function ($product) use ($cities, $category) {
            $product->cities()->attach(
                $cities->pluck('id')->toArray()
            );
            $product->categories()->attach(
                $category->id
            );
        });

        $products = Product::filter([
            'cities' => $cities->pluck('id')->toArray(),
            'category' => $category->id
        ])->paginate();
        $this->assertFalse(count($cities) === 0);
    }

}
