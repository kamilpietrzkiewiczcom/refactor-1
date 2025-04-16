<?php

namespace App\Domain;

class Amount
{
    private float $amount;

    public function __construct(float $amount)
    {
        $this->amountEquals($amount);
    }

    private function amountEquals(float $amount): void
    {
        $this->amount = $amount;
    }

    public function get(): float
    {
        return $this->amount;
    }
}
