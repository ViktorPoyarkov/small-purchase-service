<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class PurchaseControllerTest extends WebTestCase
{
    public function testPurchase(): void
    {
        $client = static::createClient();
        $client->request(
            'POST',
            '/purchase',
            [],
            [],
            ['CONTENT_TYPE' => 'application/json'],
            json_encode([
                'product' => 1,
                'couponCode' => 'D10',
                'taxNumber' => 'IT12345678901',
                'paymentProcessor' => 'stripe'
            ])
        // {"product": 1,  "couponCode": "D10", "taxNumber": "IT12345678901", "paymentProcessor": "stripe"}
        );

        $this->assertResponseIsSuccessful();
        $this->assertJson($client->getResponse()->getContent());
        $responseData = json_decode($client->getResponse()->getContent(), true);
        $this->assertArrayHasKey('payment_success', $responseData);
        $this->assertIsBool($responseData['payment_success']);
    }
}