<?php

namespace App\Domain;

use App\Domain\Exceptions\InvalidCompanyTitleLengthException;
use App\Domain\Exceptions\InvalidContractIdException;

class CompanyTitle
{
    public const MAX_LENGTH = 512;
    private string $title;

    public function __construct(int $title)
    {
        $this->assertNotEmpty($title);
        $this->assertValidLength($title);
        $this->titleEquals($title);
    }

    private function assertNotEmpty(string $title): void
    {
        if (mb_strlen($title) > 0) {
            return;
        }

        throw new InvalidContractIdException($title);
    }

    private function assertValidLength(string $title): void
    {
        if (mb_strlen($title) <= self::MAX_LENGTH) {
            return;
        }

        throw new InvalidCompanyTitleLengthException($title);
    }

    private function titleEquals(string $title): void
    {
        $this->title = $title;
    }

    public function getTitle(): string
    {
        return $this->title;
    }
}
