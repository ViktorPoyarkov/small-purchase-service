<?php

namespace App\Tests\Services;

use App\Services\PurchaseService\PurchaseService;
use App\Services\PurchaseService\PurchaseCoordinator\Interfaces\IPurchaseCoordinator;
use App\DTO\PurchaseDTO\Interfaces\IPurchaseDTO;
use PHPUnit\Framework\TestCase;

class PurchaseServiceTest extends TestCase
{
    public function testPurchase(): void
    {
        // Mock PurchaseCoordinator
        $purchaseCoordinatorMock = $this->createMock(IPurchaseCoordinator::class);

        // Mock the processPurchase method to return true (indicating successful purchase)
        $purchaseCoordinatorMock->expects($this->once())
            ->method('processPurchase')
            ->with($this->isInstanceOf(IPurchaseDTO::class)) // expects processPurchase to be called with a PurchaseDTO instance
            ->willReturn(true); // simulate successful purchase

        // Create a mock for PurchaseDTO
        $purchaseDTOMock = $this->createMock(IPurchaseDTO::class);

        // Instantiate PurchaseService with the mocked PurchaseCoordinator
        $purchaseService = new PurchaseService($purchaseCoordinatorMock);

        // Call the purchase method with the mocked PurchaseDTO
        $result = $purchaseService->purchase($purchaseDTOMock);

        // Assert that the result is true (purchase was successful)
        $this->assertTrue($result);
    }

    public function testPurchaseWithFailedProcess(): void
    {
        // Mock PurchaseCoordinator
        $purchaseCoordinatorMock = $this->createMock(IPurchaseCoordinator::class);

        // Mock the processPurchase method to return false (indicating failed purchase)
        $purchaseCoordinatorMock->expects($this->once())
            ->method('processPurchase')
            ->with($this->isInstanceOf(IPurchaseDTO::class)) // expects processPurchase to be called with a PurchaseDTO instance
            ->willReturn(false); // simulate failed purchase

        // Create a mock for PurchaseDTO
        $purchaseDTOMock = $this->createMock(IPurchaseDTO::class);

        // Instantiate PurchaseService with the mocked PurchaseCoordinator
        $purchaseService = new PurchaseService($purchaseCoordinatorMock);

        // Call the purchase method with the mocked PurchaseDTO
        $result = $purchaseService->purchase($purchaseDTOMock);

        // Assert that the result is false (purchase failed)
        $this->assertFalse($result);
    }
}