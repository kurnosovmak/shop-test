<?php

namespace App\Domain\City;

use App\Domain\Product\Product;
use Database\Factories\CityFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Builder;

class City extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [];

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'city_product');
    }

    public function scopeWithCategory(Builder $builder, int $categoryId): void
    {
        $builder->where(function ($q) use ($categoryId) {
            $q->whereHas('products', function ($q) use ($categoryId) {
                $q->whereHas('categories', function ($q) use ($categoryId) {
                    $q->where('categories.id', $categoryId);
                    $q->where('categories.id', $categoryId);
                });
            });
        });
    }

    protected static function newFactory(): CityFactory
    {
        return new CityFactory();
    }
}
