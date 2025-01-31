<?php

namespace App\Services\PriceCalculateService\Strategies\Interfaces;

use App\Entity\Coupon;

interface IPriceCalculateStrategy extends ICheckSupportPriceCalculateStrategy
{
    public function calculate(float $price, float $tax, Coupon $coupon): float;
}