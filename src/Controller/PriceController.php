<?php

namespace App\Controller;

use App\Validation\RequestValidation\Interfaces\RequestValidator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Request;
use App\DTO\PriceCalculateDTO\Interfaces\IPriceCalculateDTO as PriceCalculateDTO;
use App\Services\PriceCalculateService\Interfaces\IPriceCalculateService as PriceCalculateService;

final class PriceController extends AbstractController
{
    public function __construct(
        private readonly RequestValidator $validator
    ) {}

    #[Route('/calculate-price', name: 'calculate-price', methods: ['POST'])]
    public function calculatePrice(
        Request $request,
        PriceCalculateDTO $priceCalculateDTO,
        PriceCalculateService $priceCalculateService
    ): JsonResponse
    {
        $dto = $priceCalculateDTO::fillFromRequest($request);
        $this->validator->validate($dto);

        return $this->json(
            ['price' => $priceCalculateService->calculate($dto)]
        );
    }
}
