<?php

namespace App\Domain\Product\Filters\CaseFilters;

use App\Filter\CaseFilter;
use Illuminate\Database\Eloquent\Builder;

class CategoryCaseFilter extends CaseFilter
{
    public static string $NAME_QUERY_FIELD = 'category';
    /**
     * @param Builder $builder
     * @param int $value
     */
    function apply(Builder $builder, $value)
    {
        $builder->withCategory((int)$value);;
    }
}
