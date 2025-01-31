<?php

namespace App\Services\PriceCalculateService\Strategies;

use App\Entity\Coupon;
use App\Services\PriceCalculateService\Strategies\Interfaces\IPriceCalculateStrategy;
use App\Services\PriceCalculateService\Strategies\SupportCheckers\Interfaces\ICouponSupportChecker;

abstract class AbstractPriceCalculateStrategy implements IPriceCalculateStrategy
{
    public function __construct(private ICouponSupportChecker $couponSupportChecker)
    {
    }

    public function supports(Coupon $coupon): bool
    {
        return $this->couponSupportChecker->supports($coupon);
    }
}