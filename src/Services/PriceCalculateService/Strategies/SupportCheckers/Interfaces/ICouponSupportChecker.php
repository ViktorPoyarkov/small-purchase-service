<?php

namespace App\Services\PriceCalculateService\Strategies\SupportCheckers\Interfaces;

use App\Entity\Coupon;

interface ICouponSupportChecker
{
    public function supports(Coupon $context): bool;
}