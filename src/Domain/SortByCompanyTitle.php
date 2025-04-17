<?php

namespace App\Domain;

class SortByCompanyTitle extends AbstractSort
{
    public function getColumn(): string
    {
        return "companyTitle";
    }
}
