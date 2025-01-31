<?php

namespace App\Services\PriceCalculateService\Strategies\SupportCheckers;

use App\Entity\Coupon;
use App\Entity\Enums\TypeCoupon;
use App\Services\PriceCalculateService\Strategies\SupportCheckers\Interfaces\ISumCouponSupportChecker;
use JetBrains\PhpStorm\Pure;

class SumCouponSupportChecker implements ISumCouponSupportChecker
{
    #[Pure]
    public function supports(Coupon $context): bool
    {
        if (in_array(TypeCoupon::Sum, $context->getType())) {
            return true;
        }

        return false;
    }
}