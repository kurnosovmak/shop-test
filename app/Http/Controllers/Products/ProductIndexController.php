<?php

namespace App\Http\Controllers\Products;

use App\Domain\Category\Category;
use App\Domain\City\City;
use App\Domain\Product\Filters\ProductFilter;
use App\Domain\Product\Product;
use App\Http\Requests\Product\FilterProductRequest;
use Illuminate\Http\Request;

class ProductIndexController
{
    public function __invoke(FilterProductRequest $request)
    {
        $products = Product::filter($request->all())->paginate();
        $categories = Category::all();
        $cities = $request->category?City::withCategory($request->category)->get():City::all();

        return view('products.index', [
            'products' => $products,
            'categories' => $categories,
            'category_selected' => ($request->category),
            'cities' => $cities,
            'cities_selected' => City::whereIn('id',$request->cities??[])->get(),
        ]);
    }
}
