<?php

namespace App\Domain\Exceptions;

use App\Domain\CompanyTitle;
use InvalidArgumentException;
use Throwable;

class InvalidCompanyTitleLengthException extends InvalidArgumentException
{
    public function __construct(string $companyName, string $message = "", int $code = 0, ?Throwable $previous = null)
    {
        if (mb_strlen($message) > 0) {$message .= " - ";}
        $message .= "Invalid company title length `$companyName`. Max length is: " . CompanyTitle::MAX_LENGTH;
        parent::__construct($message, $code, $previous);
    }
}
