<?php

namespace App\Services\PriceCalculateService\Strategies;

use App\Entity\Coupon;
use App\Services\PriceCalculateService\Strategies\SupportCheckers\Interfaces\ISumCouponSupportChecker;
use JetBrains\PhpStorm\Pure;

class SumCouponPriceCalculateStrategy extends AbstractPriceCalculateStrategy
{
    public function __construct(private ISumCouponSupportChecker $couponSupportChecker)
    {
        parent::__construct($this->couponSupportChecker);
    }

    #[Pure]
    public function calculate(float $price, float $tax, Coupon $coupon): float
    {
        return $price + ($price * $tax * 0.01) - $coupon->getValue();
    }
}