<?php

namespace App\Tests\Services;

use App\Services\TaxService\TaxService;
use App\Services\TaxService\Interfaces\ITaxService;
use App\Repository\Interfaces\ITaxRepository;
use App\Entity\Tax;
use PHPUnit\Framework\TestCase;

class TaxServiceTest extends TestCase
{
    public function testGetTaxFound(): void
    {
        // Create a mock for ITaxRepository
        $taxRepositoryMock = $this->createMock(ITaxRepository::class);

        // Create a mock Tax object
        $taxMock = $this->createMock(Tax::class);

        // Configure the mock to return a Tax when findOneByTaxNumber is called with a tax number
        $taxRepositoryMock->expects($this->once())
            ->method('findOneByTaxNumber')
            ->with($this->equalTo('TAX123')) // expect the tax number 'TAX123' to be passed
            ->willReturn($taxMock); // return the mocked Tax object

        // Instantiate TaxService with the mocked repository
        $taxService = new TaxService($taxRepositoryMock);

        // Call the getTax method with the tax number 'TAX123'
        $result = $taxService->getTax('TAX123');

        // Assert that the result is the mocked Tax object
        $this->assertSame($taxMock, $result);
    }

    public function testGetTaxNotFound(): void
    {
        // Create a mock for ITaxRepository
        $taxRepositoryMock = $this->createMock(ITaxRepository::class);

        // Configure the mock to return null when findOneByTaxNumber is called with a tax number
        $taxRepositoryMock->expects($this->once())
            ->method('findOneByTaxNumber')
            ->with($this->equalTo('INVALID_TAX')) // expect the tax number 'INVALID_TAX' to be passed
            ->willReturn(null); // simulate that no tax is found

        // Instantiate TaxService with the mocked repository
        $taxService = new TaxService($taxRepositoryMock);


        // Call the getTax method with the tax number 'INVALID_TAX'
        $result = $taxService->getTax('INVALID_TAX');

        // Assert that the result is null (no tax found)
        $this->assertNull($result);
    }
}