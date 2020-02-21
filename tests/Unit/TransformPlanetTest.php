<?php

namespace App\Tests\Unit;

use App\Controller\StarWarsPlanetsController;
use PHPUnit\Framework\TestCase;

class TransformPlanetTest extends TestCase
{
    public function testAdd()
    {
        $originalPlanet = [
            'name' => 'Alderaan',
            'climate' => 'LOL',
            'diameter' => '12500',
            'surface_water' => '40',
            'created' => '2014-12-10T11:35:48.479000Z'
        ];

        $transformedPlanet = StarWarsPlanetsController::transformPlanet($originalPlanet);

        $this->assertEquals([
            'planet_name' => 'Alderaan',
            'planet_diameter' => 12500,
            'planet_climate' => 'LOL',
        ], $transformedPlanet);
    }
}
