<?php

namespace App\Factories;

use App\Domain\DefaultContractsAction;
use App\Domain\AbstractAction;
use App\Domain\ShowContractsAction;

class ActionFactory
{
    public static function get(?int $action): AbstractAction
    {
        return match($action) {
            5 => new ShowContractsAction(),
            default => new DefaultContractsAction(),
        };
    }
}
