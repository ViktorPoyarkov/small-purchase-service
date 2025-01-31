<?php

namespace App\Services\PriceCalculateService\Strategies\Interfaces;

use App\Entity\Coupon;

interface ICheckSupportPriceCalculateStrategy
{
    public function supports(Coupon $coupon): bool;
}