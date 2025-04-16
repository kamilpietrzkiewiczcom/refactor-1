<?php

namespace App\Domain;

abstract class AbstractAction
{
    abstract public function getAction(): ?int;
}
