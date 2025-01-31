<?php

namespace App\Services\PriceCalculateService\Interfaces;
use App\DTO\PriceCalculateDTO\Interfaces\IPriceCalculateDTO as PriceCalculateDTO;

interface IPriceCalculateService
{
    public function calculate(PriceCalculateDTO $priceCalculateDTO): float;
}