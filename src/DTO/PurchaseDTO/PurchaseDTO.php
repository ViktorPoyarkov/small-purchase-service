<?php

namespace App\DTO\PurchaseDTO;

use App\DTO\PriceCalculateDTO\PriceCalculateDTO;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints as Assert;

class PurchaseDTO extends PriceCalculateDTO implements Interfaces\IPurchaseDTO
{
    #[Assert\NotBlank(groups: ['First'])]
    #[Assert\NotNull(groups: ['First'])]
    public ?string $paymentProcessor;

    public static function fillFromRequest(Request $request): static
    {
        $dto = parent::fillFromRequest($request);
        $requestJson = json_decode($request->getContent(), true);
        $dto->paymentProcessor = $requestJson['paymentProcessor'] ?? null;

        return $dto;
    }
}