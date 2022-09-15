<?php

namespace App\Domain\Product\Filters;

use App\Domain\Product\Filters\CaseFilters\CategoryCaseFilter;
use App\Domain\Product\Filters\CaseFilters\CitiesCaseFilter;
use App\Filter\QueryFilter;

class ProductFilter extends QueryFilter
{

    protected function init(): array
    {
        return [
            CategoryCaseFilter::class,
            CitiesCaseFilter::class
        ];
    }

}
