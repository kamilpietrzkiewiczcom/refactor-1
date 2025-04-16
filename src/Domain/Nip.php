<?php

namespace App\Domain;

use App\Domain\Exceptions\InvalidTaxIdentificationNumber;

class Nip extends AbstractTaxIdentificationNumber
{
    private string $nip;

    public function __construct(string $nip)
    {
        $this->assertValidNip($nip);
        $this->nipEquals($nip);
    }

    private function assertValidNip(string $nip): void
    {
        $pattern = '/^[0-9]{10}$/';
        $result = preg_match($pattern, preg_replace("-","", $nip));

        if (!$result) {
            throw new InvalidTaxIdentificationNumber($nip);
        }

        $digits = str_split(preg_replace("-","", $nip));
        $checksum = (6*intval($digits[0]) + 5*intval($digits[1]) + 7*intval($digits[2]) + 2*intval($digits[3]) + 3*intval($digits[4]) + 4*intval($digits[5]) + 5*intval($digits[6]) + 6*intval($digits[7]) + 7*intval($digits[8]))%11;

        if (intval($digits[9]) != $checksum) {
            throw new InvalidTaxIdentificationNumber($nip);
        }
    }

    private function nipEquals(string $nip): void
    {
        $this->nip = $nip;
    }

    public function get(): string
    {
        return $this->nip;
    }
}
