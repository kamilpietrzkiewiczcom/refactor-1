<?php

namespace App\Domain;

class SortById extends AbstractSort
{
    public function getColumn(): string
    {
        return "id";
    }
}
