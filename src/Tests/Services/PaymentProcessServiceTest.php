<?php

namespace App\Tests\Services\PaymentProcessService;

use App\Services\PaymentProcessService\PaymentProcessService;
use App\Services\PaymentProcessService\Strategies\Resolver\Interfaces\IPaymentProcessStrategyResolver;
use App\DTO\PurchaseDTO\Interfaces\IPurchaseDTO;
use PHPUnit\Framework\TestCase;

class PaymentProcessServiceTest extends TestCase
{
    public function testProcess(): void
    {
        $strategyResolverMock = $this->createMock(IPaymentProcessStrategyResolver::class);

        $strategyMock = $this->createMock(\App\Services\PaymentProcessService\Strategies\Interfaces\IPaymentProcessStrategy::class);

        $strategyResolverMock->expects($this->once())
            ->method('resolve')
            ->with($this->isInstanceOf(IPurchaseDTO::class))
            ->willReturn($strategyMock);
        $strategyMock->expects($this->once())
            ->method('process')
            ->with($this->equalTo(100.0))
            ->willReturn(true);
        $purchaseDTOMock = $this->createMock(IPurchaseDTO::class);
        $paymentProcessService = new PaymentProcessService($strategyResolverMock);
        $result = $paymentProcessService->process(100.0, $purchaseDTOMock);
        $this->assertTrue($result);
    }

    public function testProcessWithFailedPayment(): void
    {
        $strategyResolverMock = $this->createMock(IPaymentProcessStrategyResolver::class);

        $strategyMock = $this->createMock(\App\Services\PaymentProcessService\Strategies\Interfaces\IPaymentProcessStrategy::class);

        $strategyResolverMock->expects($this->once())
            ->method('resolve')
            ->with($this->isInstanceOf(IPurchaseDTO::class))
            ->willReturn($strategyMock);

        $strategyMock->expects($this->once())
            ->method('process')
            ->with($this->equalTo(100.0))
            ->willReturn(false);
        $purchaseDTOMock = $this->createMock(IPurchaseDTO::class);
        $paymentProcessService = new PaymentProcessService($strategyResolverMock);
        $result = $paymentProcessService->process(100.0, $purchaseDTOMock);
        $this->assertFalse($result);
    }
}