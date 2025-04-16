<?php

namespace App\Domain\Exceptions;

use InvalidArgumentException;
use Throwable;

class InvalidContractIdException extends InvalidArgumentException
{
    public function __construct(int $id, string $message = "", int $code = 0, ?Throwable $previous = null)
    {
        if (mb_strlen($message) > 0) {$message .= " - ";}
        $message .= "Invalid contract id `$id`. Contract id should be more than zero";
        parent::__construct($message, $code, $previous);
    }
}
