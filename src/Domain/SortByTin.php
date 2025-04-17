<?php

namespace App\Domain;

class SortByTin extends AbstractSort
{
    public function getColumn(): string
    {
        return "tin";
    }
}
