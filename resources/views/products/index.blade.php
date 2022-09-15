@php
    /**
     * @var \Illuminate\Pagination\LengthAwarePaginator
     * @var \App\Domain\Product\Product[] $products
     * @var \App\Domain\Category\Category[] $categories
     * @var int $category_selected
     * @var \App\Domain\City\City[] $cities
     * @var int[] $cities_selected
     */
@endphp

<x-app-layout title="Products">
    <div class="filter">
        <form method="GET">
            <select name="category">
                <option
                    @if($category_selected === null)
                    selected
                    @endif
                    value="">All</option>
                @foreach($categories as $category)
                    <option
                        @if($category->id == $category_selected)
                        selected
                        @endif
                        value="{{$category->id}}">{{$category->title}}</option>
                @endforeach
            </select>

            <select name="cities[]" multiple>
                @foreach($cities as $city)
                    <option
                        @if(count($cities_selected->where('id',$city->id))>0 || count($cities_selected) ===0)
                        selected
                        @endif
                        value="{{$city->id}}">{{$city->text}}</option>
                @endforeach
            </select>
            <input type="submit" value="search">
        </form>
    </div>
    <div class="grid grid-cols-3 gap-12">
        @foreach($products as $product)
            <x-product
                :title="$product->name"
                :price="format_money($product->getItemPrice()->pricePerItemIncludingVat())"
                :actionUrl="action(\App\Http\Controllers\Cart\AddCartItemController::class, [$product])"
            />
        @endforeach
    </div>

    <div class="mx-auto mt-12">
        {{ $products->links() }}
    </div>
</x-app-layout>
