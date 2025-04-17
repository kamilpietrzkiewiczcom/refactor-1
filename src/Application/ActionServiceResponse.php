<?php

namespace App\Application;

use App\Domain\ContractsCollection;

class ActionServiceResponse
{
    public function __construct(private readonly ContractsCollection $collection) {}

    public function getResponse(): ContractsCollection
    {
        return $this->collection;
    }
}