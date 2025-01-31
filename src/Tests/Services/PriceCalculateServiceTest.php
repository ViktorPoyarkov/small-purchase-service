<?php

namespace App\Tests\Services\PriceCalculateService;

use App\Services\PriceCalculateService\PriceCalculateService;
use App\Services\CouponService\Interfaces\ICouponService;
use App\Services\PriceCalculateService\Interfaces\IPriceCalculateService;
use App\Services\PriceCalculateService\Strategies\Interfaces\IPriceCalculateStrategy;
use App\Services\PriceCalculateService\Strategies\Resolver\Interfaces\IPriceCalculateStrategyResolver;
use App\Services\ProductService\Interfaces\IProductService;
use App\Services\TaxService\Interfaces\ITaxService;
use App\DTO\PriceCalculateDTO\Interfaces\IPriceCalculateDTO;
use PHPUnit\Framework\TestCase;

class PriceCalculateServiceTest extends TestCase
{
    public function testCalculate(): void
    {
        // Mock IProductService
        $productServiceMock = $this->createMock(IProductService::class);
        $productServiceMock->expects($this->once())
            ->method('getPrice')
            ->with($this->equalTo('product_code')) // expect the product code to be passed
            ->willReturn(100.0); // mock the product price to return 100

        // Mock ICouponService
        $couponServiceMock = $this->createMock(ICouponService::class);
        $couponServiceMock->expects($this->once())
            ->method('getCoupon')
            ->with($this->equalTo('COUPON_CODE')) // expect the coupon code to be passed
            ->willReturn('COUPON_10'); // mock the coupon to return a coupon

        // Mock ITaxService
        $taxServiceMock = $this->createMock(ITaxService::class);
        $taxServiceMock->expects($this->once())
            ->method('getTax')
            ->with($this->equalTo('tax_number')) // expect the tax number to be passed
            ->willReturn($this->createMock(\App\Services\TaxService\Interfaces\ITax::class)); // return mock tax object

        // Mock the tax percentage to return 10%
        $taxMock = $this->createMock(\App\Services\TaxService\Interfaces\ITax::class);
        $taxMock->expects($this->once())
            ->method('getPercentage')
            ->willReturn(10.0);

        // Mock IPriceCalculateStrategyResolver
        $strategyResolverMock = $this->createMock(IPriceCalculateStrategyResolver::class);
        $strategyResolverMock->expects($this->once())
            ->method('setCoupon')
            ->with($this->equalTo('COUPON_10')); // expect it to set the coupon

        // Mock the strategy returned by the resolver
        $calculateStrategyMock = $this->createMock(IPriceCalculateStrategy::class);
        $strategyResolverMock->expects($this->once())
            ->method('resolve')
            ->willReturn($calculateStrategyMock);

        // Mock the calculate method in the strategy
        $calculateStrategyMock->expects($this->once())
            ->method('calculate')
            ->with($this->equalTo(100.0), $this->equalTo(10.0), $this->equalTo('COUPON_10'))
            ->willReturn(110.0); // return the calculated price

        // Create the PriceCalculateDTO mock
        $priceCalculateDTOMock = $this->createMock(IPriceCalculateDTO::class);
        $priceCalculateDTOMock->expects($this->once())
            ->method('getCouponCode')
            ->willReturn('COUPON_CODE');
        $priceCalculateDTOMock->expects($this->once())
            ->method('getProduct')
            ->willReturn('product_code');
        $priceCalculateDTOMock->expects($this->once())
            ->method('getTaxNumber')
            ->willReturn('tax_number');

        // Create the PriceCalculateService instance with the mocked dependencies
        $priceCalculateService = new PriceCalculateService(
            $productServiceMock,
            $couponServiceMock,
            $taxServiceMock,
            $strategyResolverMock
        );

        // Call the calculate method
        $result = $priceCalculateService->calculate($priceCalculateDTOMock);

        // Assert that the result is the expected calculated price
        $this->assertEquals(110.0, $result);
    }
}