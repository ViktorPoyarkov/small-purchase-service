<?php

namespace App\Services\TaxService;

use App\Entity\Tax;
use App\Repository\Interfaces\ITaxRepository;
use App\Services\TaxService\Interfaces\ITaxService;

class TaxService implements ITaxService
{
    public function __construct(private ITaxRepository $taxRepository)
    {
    }

    public function getTax(string $taxNumber): ?Tax
    {
        return $this->taxRepository->findOneByTaxNumber($taxNumber);
    }
}