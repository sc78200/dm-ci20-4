<?php

namespace App\Tests\Integration;

use PHPUnit\Framework\TestCase;
use GuzzleHttp\Client;

class StarWarsApiTest extends TestCase
{
    public function testPlanetIndex()
    {
        $client = new Client([
            'base_uri' => 'https://swapi.co/'
        ]);
        $response = $client->request('GET', 'api/planets');
        $this->assertEquals(200, $response->getStatusCode());
        $body = json_decode($response->getBody(), true);
        $this->assertIsArray($body);
        $this->assertArrayHasKey('results', $body);
        $this->assertGreaterThan(0, count($body['results']));
        $this->assertArrayHasKey('name', $body['results'][0]);
        $this->assertArrayHasKey('diameter', $body['results'][0]);
        $this->assertArrayHasKey('climate', $body['results'][0]);
    }
}
