<?php

namespace App\Services\TaxService\Interfaces;

use App\Entity\Tax;

interface ITaxService
{
    public function getTax(string $taxNumber): ?Tax;
}