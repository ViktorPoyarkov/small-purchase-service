<?php

namespace App\DTO\PriceCalculateDTO;
use App\DTO\PriceCalculateDTO\Interfaces\IPriceCalculateDTO;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints as Assert;
use App\Validation\Constraints\TaxNumberConstraint;

class PriceCalculateDTO implements IPriceCalculateDTO
{

    #[Assert\Type(
        type: 'integer',
        groups: ['First']
    )]
    #[Assert\NotBlank(groups: ['First'])]
    #[Assert\NotNull(groups: ['First'])]
    public mixed $product;

    #[Assert\NotBlank(groups: ['First'])]
    #[Assert\NotNull(groups: ['First'])]
    #[TaxNumberConstraint(groups: ['Second'])]

    public ?string $taxNumber;

    #[Assert\NotBlank(groups: ['First'])]
    #[Assert\NotNull(groups: ['First'])]
    public ?string $couponCode;

    public static function fillFromRequest(Request $request): static
    {
        $dto = new static();
        $requestJson = json_decode($request->getContent(), true);

        $dto->product = $requestJson['product'] ?? null;
        $dto->taxNumber = $requestJson['taxNumber'] ?? null;
        $dto->couponCode = $requestJson['couponCode'] ?? null;

        return $dto;
    }
}