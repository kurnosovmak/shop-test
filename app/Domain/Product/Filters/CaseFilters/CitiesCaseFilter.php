<?php

namespace App\Domain\Product\Filters\CaseFilters;

use App\Filter\CaseFilter;
use Illuminate\Database\Eloquent\Builder;

class CitiesCaseFilter extends CaseFilter
{
    public static string $NAME_QUERY_FIELD = 'cities';
    /**
     * @param Builder $builder
     * @param int[] $value
     */
    function apply(Builder $builder, $value)
    {
        $builder->withCities($value);
    }
}
