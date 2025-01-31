<?php

namespace App\Services\PurchaseService\PurchaseCoordinator;

use App\DTO\PurchaseDTO\Interfaces\IPurchaseDTO as PurchaseDTO;
use App\Services\PriceCalculateService\Interfaces\IPriceCalculateService as PriceCalculateService;
use App\Services\PaymentProcessService\Interfaces\IPaymentProcessService as PaymentProcessService;

class PurchaseCoordinator implements Interfaces\IPurchaseCoordinator
{
    public function __construct(
        private PriceCalculateService $priceCalculateService,
        private PaymentProcessService $paymentProcessService
    ) {}

    public function processPurchase(PurchaseDTO $purchaseDTO): bool
    {
        return $this->paymentProcessService->process(
            $this->priceCalculateService->calculate($purchaseDTO),
            $purchaseDTO
        );
    }
}