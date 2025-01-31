<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class PriceControllerTest extends WebTestCase
{
    public function testCalculatePrice(): void
    {
        $client = static::createClient();
        $client->request(
            'POST',
            '/calculate-price',
            [],
            [],
            ['CONTENT_TYPE' => 'application/json'],
            json_encode([
                'product' => 1,
                'couponCode' => 'D10',
                'taxNumber' => 'IT12345678901'
            ])
            // {"product": 1,  "couponCode": "D10", "taxNumber": "IT12345678901"}
        );

        $this->assertResponseIsSuccessful();
        $this->assertJson($client->getResponse()->getContent());
        $responseData = json_decode($client->getResponse()->getContent(), true);
        $this->assertArrayHasKey('price', $responseData);
        $this->assertIsNumeric($responseData['price']);
    }
}
