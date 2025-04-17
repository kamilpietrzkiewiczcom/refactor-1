<?php

namespace App\Domain;

interface ContractsRepository
{
    public function getContracts(
        ContractId $contractId,
        //AbstractAction $action,
        SortCollection $sort = new SortCollection()
    ): ContractsCollection;

}
