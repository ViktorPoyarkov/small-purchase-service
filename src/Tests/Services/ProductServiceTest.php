<?php

namespace App\Tests\Services;

use App\Services\ProductService\ProductService;
use App\Repository\Interfaces\IProductRepository;
use App\Entity\Product;
use PHPUnit\Framework\TestCase;

class ProductServiceTest extends TestCase
{
    public function testGetPriceFound(): void
    {
        // Create a mock for IProductRepository
        $productRepositoryMock = $this->createMock(IProductRepository::class);

        // Create a mock Product object
        $productMock = $this->createMock(Product::class);

        // Configure the mock to return a Product when findOneById is called with an ID of 1
        $productRepositoryMock->expects($this->once())
            ->method('findOneById')
            ->with($this->equalTo(1)) // expect the ID 1 to be passed
            ->willReturn($productMock); // return the mocked Product object

        // Configure the mock Product to return a price of 100.0 when getPrice is called
        $productMock->expects($this->once())
            ->method('getPrice')
            ->willReturn('100.00'); // return a mocked price of 100

        // Instantiate ProductService with the mocked repository
        $productService = new ProductService($productRepositoryMock);

        // Call the getPrice method with the ID 1
        $result = $productService->getPrice(1);

        // Assert that the result is the mocked price of 100.0
        $this->assertEquals('100.00', $result);
    }

    public function testGetPriceNotFound(): void
    {
        // Create a mock for IProductRepository
        $productRepositoryMock = $this->createMock(IProductRepository::class);

        // Configure the mock to return null when findOneById is called with an ID of 1
        $productRepositoryMock->expects($this->once())
            ->method('findOneById')
            ->with($this->equalTo(1)) // expect the ID 1 to be passed
            ->willReturn(null); // simulate that no product is found

        // Instantiate ProductService with the mocked repository
        $productService = new ProductService($productRepositoryMock);

        // Call the getPrice method with the ID 1
        $result = $productService->getPrice(1);

        // Assert that the result is null (no product found)
        $this->assertNull($result);
    }
}