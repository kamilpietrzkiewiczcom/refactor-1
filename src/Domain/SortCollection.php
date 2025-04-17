<?php

namespace App\Domain;

use Iterator;

class SortCollection implements Iterator
{
    private int $index = 0;

    /**
     * @var AbstractSort[] $data
     */
    private array $data = [];

    public function isEmpty(): bool
    {
        return count($this->data) === 0;
    }

    public function count(): int
    {
        return count($this->data);
    }

    public function contains(array $columns): bool
    {
        $i = 0;

        foreach ($columns as $column) {
            $stores = false;
            foreach ($this->data as $sortColumn) {
                if ($column === $sortColumn->getColumn()) {
                    $stores = true;
                    break;
                }
            }
            if ($stores) {$i++;}
        }

        return $i === count($columns);
    }

    public function getAsComaSeparatedString(): string
    {
        $string = "";

        foreach ($this->data as $sort) {
            if (mb_strlen($string) > 0) {$string .= ",";}
            $string .= $sort->getColumn();
        }

        return $string;
    }

    public function append(AbstractSort $sort): self
    {
        $this->data[] = $sort;
        return $this; // fluent interface
    }

    public function current(): AbstractSort
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
