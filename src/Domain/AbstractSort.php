<?php

namespace App\Domain;

abstract class AbstractSort
{
    abstract public function getColumn(): string;
}
