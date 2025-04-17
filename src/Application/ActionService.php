<?php

namespace App\Application;

use App\Domain\AbstractAction;
use App\Domain\ContractId;
use App\Domain\ContractsCollection;
use App\Domain\ContractsRepository;
use App\Domain\SortByCompanyTitle;
use App\Domain\SortById;
use App\Domain\SortByTin;
use App\Domain\SortCollection;

class ActionService
{
    public function __construct(private readonly ContractsRepository $contractsRepository) {}

    public function getContracts(ContractId $contractId, AbstractAction $action): ActionServiceResponse
    {
        $data = match ($action->getAction()) {
            5 => $this->getSpecificContracts($contractId),
            null => $this->getDefaultContracts($contractId)
        };

        return new ActionServiceResponse($data);
    }

    private function getSpecificContracts(ContractId $contractId): ContractsCollection
    {
        $sortCollection = new SortCollection();
        $sortCollection->append(new SortByCompanyTitle())
            ->append(new SortByTin());
        return $this->contractsRepository->getContracts($contractId, $sortCollection);
    }

    private function getDefaultContracts(ContractId $contractId): ContractsCollection
    {
        $sortCollection = new SortCollection();
        $sortCollection->append(new SortById());
        return $this->contractsRepository->getContracts($contractId, $sortCollection);
    }
}
