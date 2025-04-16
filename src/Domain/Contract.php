<?php

namespace App\Domain;

class Contract
{
    private ContractId $id;
    private CompanyTitle $companyName;
    private AbstractTaxIdentificationNumber $taxIdentificationNumber;
    private Amount $amount;

    public function __construct(ContractBuilder $builder)
    {
        $this->setId($builder->getId());
        $this->setAmount($builder->getAmount());
        $this->setCompanyName($builder->getCompanyName());
        $this->setTaxIdentificationNumber($builder->getTaxIdentificationNumber());
    }

    public static function getBuilder(): ContractBuilder
    {
        return new ContractBuilder();
    }

    private function setId(ContractId $id): void
    {
        $this->id = $id;
    }

    private function setCompanyName(CompanyTitle $companyName): void
    {
        $this->companyName = $companyName;
    }

    private function setTaxIdentificationNumber(AbstractTaxIdentificationNumber $taxIdentificationNumber): void
    {
        $this->taxIdentificationNumber = $taxIdentificationNumber;
    }

    private function setAmount(Amount $amount): void
    {
        $this->amount = $amount;
    }

    public function getId(): int
    {
        return $this->id->getId();
    }

    public function getCompanyName(): string
    {
        return $this->companyName->getTitle();
    }

    public function getTaxIdentificationNumber(): string
    {
        return $this->taxIdentificationNumber->get();
    }

    public function getAmount(): float
    {
        return $this->amount->get();
    }
}
