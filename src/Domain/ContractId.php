<?php

namespace App\Domain;

use App\Domain\Exceptions\InvalidContractIdException;

class ContractId
{
    private int $id;

    public function __construct(int $id)
    {
        $this->assertIdMoreThanZero($id);
        $this->idEquals($id);
    }

    private function assertIdMoreThanZero(int $id): void
    {
        if ($id > 0) {
            return;
        }

        throw new InvalidContractIdException($id);
    }

    private function idEquals($id): void
    {
        $this->id = $id;
    }

    public function getId(): int
    {
        return $this->id;
    }
}
