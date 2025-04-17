<?php

namespace App\Domain;

class SortByAmount extends AbstractSort
{
    public function getColumn(): string
    {
        return "amount";
    }
}
