<?php

namespace App\Services\PriceCalculateService\Strategies\SupportCheckers;

use App\Entity\Coupon;
use App\Services\PriceCalculateService\Strategies\SupportCheckers\Interfaces\IPercentageCouponSupportChecker;
use App\Entity\Enums\TypeCoupon;
use JetBrains\PhpStorm\Pure;

class PercentageCouponSupportChecker implements IPercentageCouponSupportChecker
{
    #[Pure]
    public function supports(Coupon $context): bool
    {
        if (in_array(TypeCoupon::Percentage, $context->getType())) {
            return true;
        }

        return false;
    }
}