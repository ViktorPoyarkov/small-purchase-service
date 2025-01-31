<?php

namespace App\Services\PurchaseService;

use App\DTO\PurchaseDTO\Interfaces\IPurchaseDTO as PurchaseDTO;
use App\Services\PurchaseService\Interfaces\IPurchaseService;
use App\Services\PurchaseService\PurchaseCoordinator\Interfaces\IPurchaseCoordinator as PurchaseCoordinator;


class PurchaseService implements IPurchaseService
{

    public function __construct(
        private PurchaseCoordinator $purchaseCoordinator
    )
    {
    }

    public function purchase(PurchaseDTO $purchaseDTO): bool
    {
        return $this->purchaseCoordinator->processPurchase($purchaseDTO);
    }
}