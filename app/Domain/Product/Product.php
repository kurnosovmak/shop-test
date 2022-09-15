<?php

namespace App\Domain\Product;

use App\Domain\Category\Category;
use App\Domain\City\City;
use App\Domain\Inventory\Projections\Inventory;
use App\Domain\Product\Filters\ProductFilter;
use App\Filter\Filterable;
use Database\Factories\ProductFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Product extends Model
{
    use HasFactory, Filterable;

    public static string $QueryFilterClass = ProductFilter::class;

    protected $guarded = [];

    protected $casts = [
        'manages_inventory' => 'boolean',
    ];

    protected static function newFactory(): ProductFactory
    {
        return new ProductFactory();
    }

    public function getUuid(): string
    {
        return $this->uuid;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getItemPrice(): Price
    {
        return new Price($this->item_price, $this->vat_percentage);
    }

    public function managesInventory(): bool
    {
        return $this->manages_inventory ?? false;
    }

    public function inventory(): HasOne
    {
        return $this->hasOne(Inventory::class);
    }

    public function hasAvailableInventory(int $requestedAmount): bool
    {
        return $this->inventory->amount >= $requestedAmount;
    }

    public function cities(): BelongsToMany
    {
        return $this->belongsToMany(City::class, 'city_product');
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'category_product');
    }

    public function scopeWithCities(Builder $builder, array $citiesIds): void
    {
        $builder->whereHas('cities', function ($q) use ($citiesIds) {
            $q->whereIn('cities.id', $citiesIds);
        });
    }

    public function scopeWithCategory(Builder $builder, int $categoryId): void
    {
        $builder->whereHas('categories', function ($q) use ($categoryId) {
            $q->where('categories.id', $categoryId);
        });
    }
}
