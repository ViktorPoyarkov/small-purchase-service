<?php

namespace App\Tests\Services;

use App\Services\CouponService\CouponService;
use App\Repository\Interfaces\ICouponRepository;
use App\Entity\Coupon;
use PHPUnit\Framework\TestCase;

class CouponServiceTest extends TestCase
{
    public function testGetCouponFound(): void
    {
        // Create a mock for ICouponRepository
        $couponRepositoryMock = $this->createMock(ICouponRepository::class);

        // Create a mock Coupon object
        $couponMock = $this->createMock(Coupon::class);

        // Configure the mock to return a Coupon when findOneByCode is called with 'COUPON_CODE'
        $couponRepositoryMock->expects($this->once())
            ->method('findOneByCode')
            ->with($this->equalTo('COUPON_CODE')) // expect the code 'COUPON_CODE' to be passed
            ->willReturn($couponMock); // return the mocked Coupon object

        // Instantiate CouponService with the mocked repository
        $couponService = new CouponService($couponRepositoryMock);

        // Call the getCoupon method with the code 'COUPON_CODE'
        $result = $couponService->getCoupon('COUPON_CODE');

        // Assert that the result is the mocked Coupon object
        $this->assertSame($couponMock, $result);
    }

    public function testGetCouponNotFound(): void
    {
        // Create a mock for ICouponRepository
        $couponRepositoryMock = $this->createMock(ICouponRepository::class);

        // Configure the mock to return null when findOneByCode is called with 'INVALID_CODE'
        $couponRepositoryMock->expects($this->once())
            ->method('findOneByCode')
            ->with($this->equalTo('INVALID_CODE')) // expect the code 'INVALID_CODE' to be passed
            ->willReturn(null); // return null to simulate no coupon found

        // Instantiate CouponService with the mocked repository
        $couponService = new CouponService($couponRepositoryMock);

        // Call the getCoupon method with the code 'INVALID_CODE'
        $result = $couponService->getCoupon('INVALID_CODE');

        // Assert that the result is null (coupon not found)
        $this->assertNull($result);
    }
}