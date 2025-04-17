<?php

namespace App\Domain;

use Iterator;

class ContractsCollection implements Iterator
{
    private int $index = 0;

    /**
     * @var Contract[] $data
     */
    private array $data = [];

    public function append(Contract $sort): self
    {
        $this->data[] = $sort;
        return $this; // fluent interface
    }

    public function current(): Contract
    {
        return $this->data[$this->index];
    }

    public function next(): void
    {
        $this->index++;
    }

    public function key(): int
    {
        return $this->index;
    }

    public function valid(): bool
    {
        return array_key_exists($this->index, $this->data);
    }

    public function rewind(): void
    {
        $this->index = 0;
    }
}
