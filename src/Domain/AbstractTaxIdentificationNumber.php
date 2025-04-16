<?php

namespace App\Domain;

abstract class AbstractTaxIdentificationNumber
{
    abstract public function get(): string;
}
