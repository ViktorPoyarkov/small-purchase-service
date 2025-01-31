<?php

namespace App\Services\ProductService;

use App\Repository\Interfaces\IProductRepository;
use App\Services\ProductService\Interfaces\IProductService;
use http\Exception\InvalidArgumentException;

class ProductService implements IProductService
{
    public function __construct(private IProductRepository $repository)
    {
    }

    public function getPrice(int $id): ?float
    {
        return $this->repository->findOneById($id)?->getPrice();
    }
}