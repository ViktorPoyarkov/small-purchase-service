<?php

namespace App\Controller;

use App\Validation\RequestValidation\Interfaces\RequestValidator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;
use App\DTO\PurchaseDTO\Interfaces\IPurchaseDTO as PurchaseDTO;
use Symfony\Component\HttpFoundation\Request;
use App\Services\PurchaseService\Interfaces\IPurchaseService as PurchaseService;

final class PurchaseController extends AbstractController
{
    public function __construct(
        private readonly RequestValidator $validator
    ) {}

    #[Route('/purchase', name: 'purchase', methods: ['POST'])]
    public function purchase(
        Request $request,
        PurchaseDTO $purchaseDTO,
        PurchaseService $purchaseService
    ): JsonResponse
    {
        $dto = $purchaseDTO::fillFromRequest($request);
        $this->validator->validate($dto);

        return $this->json(
            ['payment_success' => $purchaseService->purchase($dto)] // $purchaseService->purchase($dto) is boolean
        );
    }
}
