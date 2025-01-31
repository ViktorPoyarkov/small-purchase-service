<?php

namespace App\Services\TaxService\TaxNumberValidateService;

use App\Services\TaxService\Interfaces\ITaxService;
use App\Services\TaxService\TaxNumberValidateService\Interfaces\ITaxNumberValidateService;

class TaxNumberValidateService implements ITaxNumberValidateService
{
    public function __construct(private ITaxService $taxService)
    {
    }

    public function validateTaxNumber(string $taxNumber): bool
    {
        if (!preg_match('/^[A-Z]{2}[A-Z0-9]+$/', $taxNumber)) {
            return false;
        }

        return (bool) preg_match("/{$this->taxService->getTax($taxNumber)->getRegexFormat()}/", $taxNumber);
    }
}