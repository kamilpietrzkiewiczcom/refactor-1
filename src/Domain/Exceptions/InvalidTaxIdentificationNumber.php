<?php

namespace App\Domain\Exceptions;

use InvalidArgumentException;
use Throwable;

class InvalidTaxIdentificationNumber extends InvalidArgumentException
{
    public function __construct(string $tin, string $message = "", int $code = 0, ?Throwable $previous = null)
    {
        if (mb_strlen($message) > 0) {$message .= " - ";}
        $message .= "Invalid tax identification number `$tin`.";
        parent::__construct($message, $code, $previous);
    }
}
