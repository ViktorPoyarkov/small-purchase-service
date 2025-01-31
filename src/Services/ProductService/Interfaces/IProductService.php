<?php

namespace App\Services\ProductService\Interfaces;

interface IProductService
{
    public function getPrice(int $id): float|null;
}