<?php

namespace App\Services\PriceCalculateService;

use App\DTO\PriceCalculateDTO\Interfaces\IPriceCalculateDTO as PriceCalculateDTO;
use App\Services\CouponService\Interfaces\ICouponService;
use App\Services\PriceCalculateService\Interfaces\IPriceCalculateService;
use App\Services\PriceCalculateService\Strategies\Resolver\Interfaces\IPriceCalculateStrategyResolver;
use App\Services\ProductService\Interfaces\IProductService;
use App\Services\TaxService\Interfaces\ITaxService;

class PriceCalculateService implements IPriceCalculateService
{
    public function __construct(
        private IProductService $productService,
        private ICouponService $couponService,
        private ITaxService $taxService,
        private IPriceCalculateStrategyResolver $strategyResolver
    )
    {
    }

    public function calculate(PriceCalculateDTO $priceCalculateDTO): float
    {
        $coupon = $this->couponService->getCoupon($priceCalculateDTO->couponCode);
        $this->strategyResolver->setCoupon($coupon);
        $calculateStrategy = $this->strategyResolver->resolve();

        return $calculateStrategy->calculate(
            $this->productService->getPrice($priceCalculateDTO->product),
            $this->taxService->getTax($priceCalculateDTO->taxNumber)->getPercentage(),
            $coupon
        );
    }
}